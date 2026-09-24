<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('is_active');
        });

        // Assign sequential order to existing articles based on published_at desc
        $articles = DB::table('articles')->orderByDesc('published_at')->get();
        foreach ($articles as $i => $article) {
            DB::table('articles')->where('id', $article->id)->update(['sort_order' => $i + 1]);
        }
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
