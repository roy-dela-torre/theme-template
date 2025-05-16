=== Theme Name ===
## Contributors

*Add your name or GitHub username here.*

---

## Description

**Theme Template** is a modern, developer-focused WordPress theme designed for flexibility and customization. Inspired by Shopify’s `theme.liquid` structure, it offers a modular layout, reusable components, and follows current best practices—all while staying lightweight and efficient.

Perfect for blogs, business sites, or portfolios, this theme provides a solid foundation without unnecessary bloat. It’s compatible with popular plugins and optimized for speed and SEO.

---

## Installation

1. Upload the theme folder to `/wp-content/themes/`
2. In your WordPress dashboard, go to Appearance > Themes
3. Activate the theme

---

## Changelog

### 1.0.0
- Initial release

---

## Credits

- **normalize.css** – Nicolas Gallagher (MIT License)

---

## License

This theme is licensed under GPL v2 or later.

---

## Recommended Plugins

Enhance your site’s functionality with these plugins:

- **Advanced Contact Form 7** – Adds advanced features to Contact Form 7
- **Contact Form 7 Database Addon (CFDB7)** – Saves form submissions to the database
- **Contact Form 7 Redirection** – Redirects users after form submission
- **Redirection** – Manages 301 redirects and tracks 404 errors
- **Better Search Replace** – Search and replace data in your database
- **Advanced Custom Fields (ACF)** – Add custom fields to posts and pages
- **Custom Post Type UI** – Create and manage custom post types and taxonomies
- **Yoast SEO** – Comprehensive SEO toolkit

Refer to each plugin’s documentation for installation and usage.

---

## Optimization Tips

To maximize performance and SEO:

- **SEO-Friendly Headers:**  
    Use semantic HTML header tags (`<h1>`, `<h2>`, etc.) in your templates. Ensure each page has a single `<h1>` and a logical heading structure for accessibility and SEO.

- **Image Optimization:**  
    - Compress images before uploading  
    - Keep image files under 500KB (never exceed 1MB)  
    - Use modern formats like WebP  
    - Add descriptive `alt` text for accessibility and SEO

- **Additional Tips:**  
    - Use an SEO plugin (e.g., Yoast SEO or Rank Math) for meta tags and sitemaps  
    - Minimize heavy plugins and scripts  
    - Enable caching and use a CDN for faster load times

Following these practices will help keep your site fast, accessible, and search engine friendly.

---

## Template File Guidance

To create custom templates for custom post types, use these naming conventions:

- `single-slug.php` – For single post type entries
- `archive-slug.php` – For post type archives

Replace `slug` with your custom post type’s slug.

For `stylesheet-manager.php` and `script-manager.php`, review the files and remove any unnecessary or unused template code. Some styles or scripts are included only for demonstration—feel free to delete anything not needed for your implementation.

To keep your code clean when using SVGs, use the following example:

```php
$svg_path = get_stylesheet_directory_uri() . '/assets/svg/';
echo file_get_contents($svg_path . 'search.svg');
```