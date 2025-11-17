<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $medias = Permission::firstOrNew( [ 'namespace' => 'wickxpos.upload.medias' ] );
    $medias->name = __( 'Upload Medias' );
    $medias->namespace = 'wickxpos.upload.medias';
    $medias->description = __( 'Let the user upload medias.' );
    $medias->save();

    $medias = Permission::firstOrNew( [ 'namespace' => 'wickxpos.see.medias' ] );
    $medias->name = __( 'See Medias' );
    $medias->namespace = 'wickxpos.see.medias';
    $medias->description = __( 'Let the user see medias.' );
    $medias->save();

    $medias = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.medias' ] );
    $medias->name = __( 'Delete Medias' );
    $medias->namespace = 'wickxpos.delete.medias';
    $medias->description = __( 'Let the user delete medias.' );
    $medias->save();

    $medias = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.medias' ] );
    $medias->name = __( 'Update Medias' );
    $medias->namespace = 'wickxpos.update.medias';
    $medias->description = __( 'Let the user update uploaded medias.' );
    $medias->save();
}
