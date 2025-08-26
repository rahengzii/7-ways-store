<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Carts (holds pre-order state, including checkout info)
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id', 100)->nullable()->unique(); // guests
            $table->string('status', 20)->default('active'); // active|abandoned|converted
            $table->string('currency', 3)->default('USD');

            // Totals (cart stage)
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('discount_total', 10, 2)->default(0);
            $table->decimal('shipping_total', 10, 2)->default(0);
            $table->decimal('tax_total', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->default(0);

            // Checkout info captured before placing order
            $table->string('checkout_email')->nullable();
            $table->string('checkout_phone', 30)->nullable();
            $table->string('shipping_method', 50)->nullable();
            $table->string('payment_method_pref', 50)->nullable();

            // Optional snapshots of addresses/contact before order
            $table->json('bill_to')->nullable(); // {full_name,line1,line2,city,state,postal_code,country_code,phone,label}
            $table->json('ship_to')->nullable();

            $table->timestamps();
            $table->index(['status', 'updated_at']);
        });

        // Single Line Items table (polymorphic: belongs to Cart OR Order)
        Schema::create('line_items', function (Blueprint $table) {
            $table->id();

            // parent: Cart or Order
            $table->morphs('parent'); // parent_type, parent_id

            // references (keep product relations for integrity; snapshot strings for invoice readability)
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->foreignId('product_variant_id')->nullable()->constrained('product_variants')->nullOnDelete();

            // snapshots for resiliency on invoices
            $table->string('name');
            $table->string('sku')->nullable();

            // quantities & pricing
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('line_total', 10, 2);

            // arbitrary product snapshot at add-time (image, attributes, etc.)
            $table->json('snapshot')->nullable();

            $table->timestamps();

           
        });

        // Orders (immutable snapshot for invoices)
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('cart_id')->nullable()->constrained()->nullOnDelete();

            // Invoice identity
            $table->string('invoice_no')->unique(); // e.g. INV-2025-000123
            $table->timestamp('ordered_at')->useCurrent();

            // Statuses
            $table->string('status', 20)->default('pending'); // pending|paid|shipped|completed|cancelled|refunded
            $table->string('payment_method', 50)->nullable(); // shown on invoice
            $table->string('payment_status', 20)->default('unpaid');

            // Totals snapshot (immutable for audit)
            $table->string('currency', 3)->default('USD');
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('discount_total', 10, 2)->default(0);
            $table->decimal('shipping_total', 10, 2)->default(0);
            $table->decimal('tax_total', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->default(0);

            // Contact + addresses snapshot (immutable for the invoice)
            $table->string('contact_email')->nullable();
            $table->string('contact_phone', 30)->nullable();
            $table->json('bill_to')->nullable();
            $table->json('ship_to')->nullable();

            $table->timestamps();
            $table->index(['status', 'ordered_at']);
        });

        // Payments (per order)
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();

            $table->string('provider', 50)->nullable(); // e.g. stripe, paypal
            $table->string('method', 50)->nullable();   // credit_card, etc.
            $table->string('status', 20)->default('pending'); // pending|authorized|captured|failed|refunded
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('transaction_id')->nullable();
            $table->json('raw_payload')->nullable(); // gateway response

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('line_items');
        Schema::dropIfExists('carts');
    }
};
