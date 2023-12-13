<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    private $columns = ['post_title', 'description'];
public function store(Request $request): RedirectResponse
{
Client::create($request->only($this->columns));
return redirect('posts');
}
}
