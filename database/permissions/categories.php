<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $category = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.categories' ] );
    $category->name = __( 'Create Categories' );
    $category->namespace = 'wickxpos.create.categories';
    $category->description = __( 'Let the user create products categories.' );
    $category->save();

    $category = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.categories' ] );
    $category->name = __( 'Delete Categories' );
    $category->namespace = 'wickxpos.delete.categories';
    $category->description = __( 'Let the user delete products categories.' );
    $category->save();

    $category = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.categories' ] );
    $category->name = __( 'Update Categories' );
    $category->namespace = 'wickxpos.update.categories';
    $category->description = __( 'Let the user update products categories.' );
    $category->save();

    $category = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.categories' ] );
    $category->name = __( 'Read Categories' );
    $category->namespace = 'wickxpos.read.categories';
    $category->description = __( 'Let the user read products categories.' );
    $category->save();
}
