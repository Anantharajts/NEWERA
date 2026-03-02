<?php
include('database.php');
include('admin_header.php');
?>
<style>
    /* Top Navigation Bar */
    .top-bar {
        background: var(--white);
        padding: 1rem 2rem;
        border-bottom: 1px solid var(--border);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .page-title {
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .breadcrumb {
        color: var(--text-muted);
        font-size: 0.875rem;
    }

    /* Main Layout */
    .container {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 1.5rem;
        padding: 1.5rem 2rem 100px;
        /* Bottom padding for sticky footer */
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .container {
            grid-template-columns: 1fr;
        }
    }

    /* Card Styling */
    .card {
        background: var(--white);
        border-radius: 0.5rem;
        border: 1px solid var(--border);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .card-header {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border);
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: var(--text-main);
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        padding: 0.65rem 0.85rem;
        border: 1px solid var(--border);
        border-radius: 0.375rem;
        font-size: 0.9rem;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    /* Media Upload Zone */
    .upload-zone {
        border: 2px dashed var(--border);
        border-radius: 0.5rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        /* transition: background 0.2s;- */
    }

    .upload-zone:hover {
        background-color: #f3f4f6;
    }

    .upload-icon {
        font-size: 2rem;
        color: var(--text-muted);
    }

    .upload-text {
        margin-top: 0.5rem;
        color: var(--text-muted);
        font-size: 0.9rem;
    }

    /* Pricing Grid */
    .pricing-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    /* Sidebar specific */
    .sidebar-card {
        position: sticky;
        top: 80px;
    }
</style>


<!-- Main Content -->
<div class="container">

    <!-- Left Column -->
    <main style="background-color: white;border-radius: 0.5rem;padding:15px;">
        <!-- Basic Info Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Basic Information</h3>
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" class="form-input">
            </div>

            <div class="form-group">
                <label for="product-name">Brand Name</label>
                <input type="text" id="product-name" class="form-input">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-textarea" placeholder="Write a description of your product..."></textarea>
            </div>
        </div>

        <!-- Media Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Media</h3>
            <div class="upload-zone">
                <div class="upload-icon">🖼️</div>
                <div class="upload-text">Drop images here or click to upload</div>
                <input type="file" style="display: none;">
            </div>
        </div>

        <!-- Pricing Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Pricing</h3>
            <div class="pricing-grid">
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="text" id="price" class="form-input" placeholder="0.00">
                </div>
                <div class="form-group">
                    <label for="compare-price">Delivery Charge ($)</label>
                    <input type="text" id="compare-price" class="form-input" placeholder="0.00">
                </div>
            </div>

        </div>

        <!-- Inventory Card -->
        <div class="card" style="background-color: #dddddd;">
            <h3 class="card-header">Inventory</h3>
            <div class="pricing-grid">
                <div class="form-group">
                    <label for="sku">Quantity</label>
                    <input type="number" id="sku" class="form-input">
                </div>
                <div class="form-group">
                    <label for="barcode">Size</label>
                    <input type="text" id="barcode" class="form-input">
                </div>
            </div>
        </div>

        <div class="col" style="text-align: center;">
            <button class="pro_addbtn" type="submit" name="productbtn" style="width: 100%;background-color:black;color:white;padding-top:5px;padding-bottom:5px;">ADD</button>
        </div>

    </main>

    <!-- Right Column (Sidebar) -->
    <aside class="sidebar-card">
        <!-- Status Card -->
        <div class="card" style="background-color: white;">
            <h3 class="card-header">Status</h3>
            <div class="form-group">
                <label for="status">Product Status</label>
                <select id="status" class="form-select" style="background-color: #dddddd;">
                    <option value="active">Active</option>
                    <option value="draft">Draft</option>
                    <option value="archived">Archived</option>
                </select>
            </div>
        </div>

        <!-- Organization Card -->
        <div class="card" style="background-color: white;">
            <h3 class="card-header">Organization</h3>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" class="form-select" style="background-color: #dddddd;">
                    <option value="">Select Category</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="home">Home & Garden</option>
                </select>
            </div>
        </div>
    </aside>

</div>

</body>

</html>