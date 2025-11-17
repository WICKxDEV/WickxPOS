<?php

use App\Models\Permission;
use App\Models\Role;

if ( ! Permission::namespace( 'wickxpos.pos.edit-purchase-price' ) instanceof Permission ) {
    $pos = Permission::firstOrNew( [ 'namespace' => 'wickxpos.pos.edit-purchase-price' ] );
    $pos->name = __( 'Edit Purchase Price' );
    $pos->namespace = 'wickxpos.pos.edit-purchase-price';
    $pos->description = __( 'Let the user edit the purchase price of products.' );
    $pos->save();
}

if ( ! Permission::namespace( 'wickxpos.pos.edit-settings' ) instanceof Permission ) {
    $pos = Permission::firstOrNew( [ 'namespace' => 'wickxpos.pos.edit-settings' ] );
    $pos->name = __( 'Edit Order Settings' );
    $pos->namespace = 'wickxpos.pos.edit-settings';
    $pos->description = __( 'Let the user edit the order settings.' );
    $pos->save();
}

if ( ! Permission::namespace( 'wickxpos.pos.products-discount' ) instanceof Permission ) {
    $pos = Permission::firstOrNew( [ 'namespace' => 'wickxpos.pos.products-discount' ] );
    $pos->name = __( 'Edit Product Discounts' );
    $pos->namespace = 'wickxpos.pos.products-discount';
    $pos->description = __( 'Let the user add discount on products.' );
    $pos->save();
}

if ( ! Permission::namespace( 'wickxpos.pos.cart-discount' ) instanceof Permission ) {
    $pos = Permission::firstOrNew( [ 'namespace' => 'wickxpos.pos.cart-discount' ] );
    $pos->name = __( 'Edit Cart Discounts' );
    $pos->namespace = 'wickxpos.pos.cart-discount';
    $pos->description = __( 'Let the user add discount on cart.' );
    $pos->save();
}

if ( ! Permission::namespace( 'wickxpos.pos.delete-order-product' ) instanceof Permission ) {
    $pos = Permission::firstOrNew( [ 'namespace' => 'wickxpos.pos.delete-order-product' ] );
    $pos->name = __( 'POS: Delete Order Products' );
    $pos->namespace = 'wickxpos.pos.delete-order-product';
    $pos->description = __( 'Let the user delete order products on POS.' );
    $pos->save();
}

// Create POS cart action permissions
$posCartPermissions = [
    'wickxpos.cart.product-discount' => __( 'Cart: Change Product Discount' ),
    'wickxpos.cart.product-price' => __( 'Cart: Edit Product Price' ),
    'wickxpos.cart.product-wholesale-price' => __( 'Cart: Use Wholesale Price' ),
    'wickxpos.cart.product-delete' => __( 'Cart: Product Delete' ),
    'wickxpos.cart.settings' => __( 'Cart: Change Settings' ),
    'wickxpos.cart.taxes' => __( 'Cart: Set Taxes' ),
    'wickxpos.cart.comments' => __( 'Cart: Add Comments' ),
    'wickxpos.cart.order-type' => __( 'Cart: Change Order Type' ),
    'wickxpos.cart.coupons' => __( 'Cart: Apply Coupons' ),
    'wickxpos.cart.products' => __( 'Cart: Create Quick Product' ),
    'wickxpos.cart.void' => __( 'Cart: Void Order' ),
    'wickxpos.cart.discount' => __( 'Cart: Apply Discount' ),
    'wickxpos.cart.hold' => __( 'Cart: Hold Order' ),
];

foreach ( $posCartPermissions as $namespace => $name ) {
    $permission = Permission::firstOrNew( [ 'namespace' => $namespace ] );
    $permission->name = $name;
    $permission->namespace = $namespace;
    $permission->description = sprintf( __( 'Allow access to %s feature in POS cart.' ), strtolower( $name ) );
    $permission->save();
}

/**
 * Assign new permissions to admin role
 */
$admin = Role::namespace( 'admin' );
if ( $admin instanceof Role ) {
    $admin->addPermissions( array_keys( $posCartPermissions ) );
}
