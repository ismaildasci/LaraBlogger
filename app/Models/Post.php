<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function test()
    {
        return collect(File::files(resource_path("posts")))
             ->map(fn ($file) => YamlFrontMatter::parseFile($file))
             ->map(fn ($document) => new Post(
                 $document->title,
                 $document->excerpt,
                 $document->date,
                 $document->body(),
                 $document->slug
             ));
    }

    public static function find($slug)
    {
        return static::test()->firstWhere('slug', $slug);
    }
}
