<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../functions.php';

class FunctionsTest extends TestCase {

    // Existing function existence tests...
    public function test_understrap_remove_scripts_exists() {
        $this->assertTrue(function_exists('understrap_remove_scripts'));
    }

    public function test_theme_enqueue_styles_exists() {
        $this->assertTrue(function_exists('theme_enqueue_styles'));
    }

    public function test_add_child_theme_textdomain_exists() {
        $this->assertTrue(function_exists('add_child_theme_textdomain'));
    }

    public function test_tse_widgets_init_exists() {
        $this->assertTrue(function_exists('tse_widgets_init'));
    }

    public function test_tse_widgets_init1_exists() {
        $this->assertTrue(function_exists('tse_widgets_init1'));
    }

    public function test_tse_news_register_widget_exists() {
        $this->assertTrue(function_exists('tse_news_register_widget'));
    }

    public function test_tse_excerpt_more_exists() {
        $this->assertTrue(function_exists('tse_excerpt_more'));
    }

    public function test_tse_search_filter_exists() {
        $this->assertTrue(function_exists('tse_search_filter'));
    }

    public function test_category_add_form_fields_callback_exists() {
        $this->assertTrue(function_exists('category_add_form_fields_callback'));
    }

    public function test_admin_enqueue_scripts_callback_exists() {
        $this->assertTrue(function_exists('admin_enqueue_scripts_callback'));
    }

    public function test_custom_create_term_callback_exists() {
        $this->assertTrue(function_exists('custom_create_term_callback'));
    }

    public function test_category_edit_form_fields_callback_exists() {
        $this->assertTrue(function_exists('category_edit_form_fields_callback'));
    }

    public function test_edit_term_callback_exists() {
        $this->assertTrue(function_exists('edit_term_callback'));
    }

    public function test_rlv_remove_unwanted_exists() {
        $this->assertTrue(function_exists('rlv_remove_unwanted'));
    }

    public function test_create_custom_posttype_exists() {
        $this->assertTrue(function_exists('create_custom_posttype'));
    }

    // ---------------- NEW: create_custom_posttype Tests ----------------

public function test_create_custom_posttype_registration() {
    // Force CPT creation
    create_custom_posttype();

    $this->assertTrue(post_type_exists('demo-cpts'), "Custom post type should exist");

    $post_type_obj = get_post_type_object('demo-cpts');
    $this->assertNotNull($post_type_obj, "Post type object should not be null");

    $this->assertEquals('Demo CPT', $post_type_obj->labels->name, "Post type label mismatch");

    // These will fail if you set them to false
    $this->assertTrue($post_type_obj->public, "Custom post type must be public.");
    $this->assertTrue($post_type_obj->publicly_queryable, "Custom post type must be publicly queryable.");
    $this->assertTrue($post_type_obj->has_archive, "Custom post type must have archive enabled.");

    
    // UI & query settings
    $this->assertTrue($post_type_obj->show_ui, "Custom post type UI should be visible.");
    $this->assertFalse($post_type_obj->query_var, "Query var should be false.");

    // Rewrite settings
    $this->assertArrayHasKey('slug', $post_type_obj->rewrite, "Rewrite slug should exist.");
    $this->assertEquals('demo-cpt', $post_type_obj->rewrite['slug'], "Rewrite slug mismatch.");
    $this->assertFalse($post_type_obj->rewrite['with_front'], "Rewrite with_front should be false.");

    // Capability & hierarchy
    $this->assertEquals('post', $post_type_obj->capability_type, "Capability type mismatch.");
    $this->assertFalse($post_type_obj->hierarchical, "Hierarchical should be false.");

    // Supported features
    $this->assertContains('title', $post_type_obj->supports, "Title should be supported.");
    $this->assertContains('editor', $post_type_obj->supports, "Editor should be supported.");
    $this->assertContains('author', $post_type_obj->supports, "Author should be supported.");
    $this->assertContains('thumbnail', $post_type_obj->supports, "Thumbnail should be supported.");
    $this->assertContains('excerpt', $post_type_obj->supports, "Excerpt should be supported.");
}

    public function test_create_custom_posttype_labels() {
        create_custom_posttype();

        $post_type_obj = get_post_type_object('demo-cpts');

        $this->assertEquals('Demo CPT', $post_type_obj->labels->name);
        $this->assertEquals('Demo CPT', $post_type_obj->labels->singular_name);
    }

    public function test_create_custom_posttype_supports() {
        create_custom_posttype();

        $post_type_obj = get_post_type_object('demo-cpts');

        $this->assertContains('title', $post_type_obj->supports);
        $this->assertContains('editor', $post_type_obj->supports);
        $this->assertContains('author', $post_type_obj->supports);
        $this->assertContains('thumbnail', $post_type_obj->supports);
        $this->assertContains('excerpt', $post_type_obj->supports);
    }

    public function test_create_custom_posttype_flags() {
        create_custom_posttype();

        $post_type_obj = get_post_type_object('demo-cpts');

        $this->assertTrue($post_type_obj->public);
        $this->assertTrue($post_type_obj->publicly_queryable);
        $this->assertTrue($post_type_obj->has_archive);
        $this->assertTrue($post_type_obj->show_ui);
        $this->assertFalse($post_type_obj->query_var);
    }

    public function test_create_custom_posttype_rewrite_rules() {
        create_custom_posttype();

        $post_type_obj = get_post_type_object('demo-cpts');

        $this->assertEquals('demo-cpt', $post_type_obj->rewrite['slug']);
        $this->assertFalse($post_type_obj->rewrite['with_front']);
    }

    // ---------------- Existing error and warning tests ----------------
    public function test_missing_function() {
        $this->expectWarning();
        missing_function_call();
    }

    public function test_undefined_method() {
        $this->expectError();
        $obj = new \stdClass();
        $obj->nonExistentMethod();
    }

    public function test_division_by_zero() {
        $this->expectWarning();
        $result = 10 / 0;
    }

    public function test_trigger_warning() {
        $this->expectWarning();
        $array = [];
        echo $array['non_existing_key'];
    }

    public function test_trigger_notice() {
        $this->expectNotice();
        $undefinedVar++;
    }

    public function test_assertion_failure() {
        $this->assertEquals(5, 2 + 2);
    }

    public function test_type_error() {
        $this->expectException(\TypeError::class);
        strlen(10);
    }

    public function test_eval_parse_error() {
        $this->expectException(\ParseError::class);
        eval('echo "missing semicolon"');
    }
}
