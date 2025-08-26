<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable()->unique(); // base SKU (optional if using only variant SKUs)
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Base price (can be overridden by variant price)
            $table->decimal('price', 10, 2);
            $table->decimal('compare_at_price', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');

            // Simple merchandising flags you can still show on PDP/listing
            $table->string('badge')->nullable(); // e.g., "new", "sale"
            $table->decimal('rating_avg', 3, 2)->default(0);
            $table->unsignedInteger('rating_count')->default(0);

            $table->boolean('is_published')->default(true);
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['name', 'sku']);
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->primary(['category_id', 'product_id']);
        });

        // Variants with JSON attributes (combines colors/sizes/etc.)
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('sku')->nullable()->unique();
            $table->decimal('price', 10, 2)->nullable(); // overrides product.price when set
            $table->integer('stock')->default(0);
            $table->string('status', 20)->default('active');

            // e.g. {"color":"Black","size":"M"}  — replace separate colors/sizes tables
            $table->json('attributes')->nullable();

            // Optional: unique hash to prevent duplicate attribute combos per product
            $table->string('attributes_hash', 64)->nullable()->index();

            $table->timestamps();
            $table->index(['product_id', 'status', 'stock']);
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('path');   // storage path or URL
            $table->string('alt')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();

            $table->index(['product_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};
