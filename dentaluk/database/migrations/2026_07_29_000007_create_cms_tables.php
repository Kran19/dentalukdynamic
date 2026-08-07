<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pages Table
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // Page Sections Table
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->string('section_key');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->json('content')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Media Folders Table
        Schema::create('media_folders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('parent_id')->nullable()->constrained('media_folders')->nullOnDelete();
            $table->timestamps();
        });

        // Media Library Table
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('folder_id')->nullable()->constrained('media_folders')->nullOnDelete();
            $table->string('filename');
            $table->string('file_path');
            $table->string('disk')->default('public');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->default(0);
            $table->string('alt_text')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        // Treatment Categories Table
        Schema::create('treatment_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Treatments Table
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('treatment_categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_desc')->nullable();
            $table->longText('full_content')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('icon_class')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // Smile Stories / Transformations Table
        Schema::create('smile_stories', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('location')->default('Wembley');
            $table->string('category')->default('SMILE MAKEOVER');
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();
            $table->string('avatar_image')->nullable();
            $table->string('quote')->nullable();
            $table->text('story_body')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        // FAQs Table
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('General');
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('smile_stories');
        Schema::dropIfExists('treatments');
        Schema::dropIfExists('treatment_categories');
        Schema::dropIfExists('media');
        Schema::dropIfExists('media_folders');
        Schema::dropIfExists('page_sections');
        Schema::dropIfExists('pages');
    }
};
