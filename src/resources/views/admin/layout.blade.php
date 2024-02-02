@extends('admin::layouts.app')

@section('content')

    <div>

        <div class="container px-5 mb-2">

            <div class="mt-3">
                <h1><?php _e('License Server v1.0'); ?></h1>
            </div>

            <div>
                <style>
                    .table td{
                        vertical-align: middle;
                    }
                    .newsletter-navigation .mdi {
                        font-size:20px;
                    }
                </style>

                <nav class="nav nav-pills nav-justified btn-group btn-group-toggle btn-hover-style-3 newsletter-navigation">
                    <a class="btn btn-outline-dark justify-content-center gap-2 <?php if(route_is('admin.license-server.index')) : ?>active<?php endif;?>" href="<?php print route('admin.license-server.index'); ?>"><i class="mdi mdi-key mr-1"></i> <?php _e('Licenses'); ?></a>
<!--
                    <a class="btn btn-outline-dark justify-content-center gap-2 <?php if(route_is('admin.license-server.licenses')) : ?>active<?php endif;?>" href="<?php print route('admin.license-server.licenses'); ?>"><i class="mdi mdi-clipboard-text-outline mr-1"></i> <?php _e('Licenses'); ?></a>
-->

                    <a class="btn btn-outline-dark justify-content-center gap-2 <?php if(route_is('admin.license-server.licensed-products')) : ?>active<?php endif;?>" href="<?php print route('admin.license-server.licensed-products'); ?>"><i class="mdi mdi-format-list-bulleted-square mr-1"></i> <?php _e('Licensed products'); ?></a>
                    <a class="btn btn-outline-dark justify-content-center gap-2 <?php if(route_is('admin.license-server.settings')) : ?>active<?php endif;?>" href="<?php print route('admin.license-server.settings'); ?>"><i class="mdi mdi-cog-outline mr-1"></i> <?php _e('Settings'); ?></a>

                </nav>

                <div class="py-3">
                    @yield('content-admin-license-server')
                </div>

            </div>
        </div>
    </div>

@endsection
