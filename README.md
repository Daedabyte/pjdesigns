# PJ Designs WordPress Theme

A custom WordPress theme for PJ Designs - Full-service interior design and retail furniture business.

## Features

- ✨ Modern, responsive design
- 🎨 Dynamic logo swap on scroll (white/color versions)
- 📊 Animated scroll progress indicator
- 🌊 Parallax hero section
- 🌀 Animated wave section dividers
- 📱 Mobile-friendly navigation
- 🖼️ Portfolio lightbox gallery
- 🎠 Brand partners carousel
- 📅 Calendly integration for bookings
- 🔧 **ACF (Advanced Custom Fields) integration for easy content management**

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- **Advanced Custom Fields (Free version)** plugin

## Installation

### Step 1: Install WordPress
1. Set up a WordPress installation on your server
2. Complete the WordPress setup wizard

### Step 2: Install Required Plugin
1. In WordPress admin, go to **Plugins > Add New**
2. Search for "Advanced Custom Fields"
3. Install and activate the **Advanced Custom Fields** plugin (free version)

### Step 3: Install Theme

**Option A: Create ZIP File Locally**
1. Download all theme files from this repository
2. Create a ZIP file containing: `style.css`, `functions.php`, `header.php`, `footer.php`, `index.php`, `front-page.php`, `README.md`, and the `images/` folder
3. In WordPress admin, go to **Appearance > Themes > Add New > Upload Theme**
4. Upload the ZIP file and click **Install Now**
5. Activate the **PJ Designs** theme

**Option B: Manual Installation via FTP/File Manager**
1. Download all theme files from this repository
2. Create a folder named `pjdesigns` on your computer
3. Place all theme files (style.css, functions.php, header.php, footer.php, index.php, front-page.php) and the images folder inside
4. Upload the entire `pjdesigns` folder to `/wp-content/themes/` via FTP or your hosting file manager
5. In WordPress admin, go to **Appearance > Themes**
6. Activate the **PJ Designs** theme

**Note:** The complete theme with images is approximately 162MB. If you need to create a ZIP file, use this command in the theme directory:
```bash
zip -r pjdesigns-theme.zip style.css functions.php header.php footer.php index.php front-page.php README.md images/ -x "*.git*"
```

### Step 4: Upload Logo Images
1. Upload your logo files to the theme images folder:
   - `wp-content/themes/pjdesigns/images/PJ_Logo_White.png`
   - `wp-content/themes/pjdesigns/images/PJ_Logo_Color.png`

2. Or set them via ACF:
   - Go to **Theme Settings** in WordPress admin
   - Upload the white and color logo versions

### Step 5: Create Your Homepage
1. Go to **Pages > Add New**
2. Create a page titled "Home" (you can leave the content empty)
3. Publish the page
4. Go to **Settings > Reading**
5. Set "A static page" and select "Home" as your homepage

### Step 6: Configure Content with ACF
After activating the theme, you'll see new field groups in your page editor. Fill them out to customize:

#### Hero Section
- Hero Title
- Hero Subtitle
- Hero Tagline
- Button Text & Link
- Background Images (up to 4 images for carousel)

#### Brand Partners Section
- Section Title
- Introduction Text
- Brand Logos (repeater field)
  - Add each brand logo image
  - Add brand tagline

#### About Section
- Section Title
- About Content (WYSIWYG editor)
- Gallery Images (3 images)

#### Services Section
- Section Title
- Services (repeater - up to 6 services)
  - Service Title
  - Description
  - Card Type (Solid Background or Background Image)
  - Service Image
  - Background Color (for solid type)

#### Portfolio Section
- Section Title
- Portfolio Images (repeater)

#### Booking Section
- Section Title
- Introduction Text
- Calendly URL (enter your Calendly scheduling page URL)

#### Contact Section
- Section Title
- Contact Heading
- Introduction Text
- Email Address
- Phone Number
- Location

### Step 7: Set Up Navigation (Optional)
1. Go to **Appearance > Menus**
2. Create a new menu or use the default navigation
3. Assign it to the "Primary Menu" location

Default navigation links are provided if no menu is set:
- Home
- About
- Services
- Portfolio
- Book Now
- Contact

## File Structure

```
pjdesigns/
├── style.css           # Theme styles and WordPress theme header
├── functions.php       # Theme functions and ACF field registration
├── header.php          # Header template with navigation
├── footer.php          # Footer template with JavaScript
├── index.php           # Main fallback template (required by WordPress)
├── front-page.php      # Homepage template with ACF integration
├── images/             # Theme images folder
│   ├── PJ_Logo_White.png
│   ├── PJ_Logo_Color.png
│   └── (other images)
└── README.md           # This file
```

## ACF Field Groups

The theme automatically registers the following ACF field groups:

- **Hero Section** - Homepage hero slider settings
- **About Section** - About content and gallery
- **Services Section** - Service cards (repeater)
- **Brand Partners Section** - Brand carousel (repeater)
- **Portfolio Section** - Portfolio gallery (repeater)
- **Booking Section** - Calendly integration settings
- **Contact Section** - Contact information
- **Logo Settings** - White and color logo uploads (Options Page)

## Customization

### Colors
To change theme colors, edit the CSS variables in `style.css`:

```css
:root {
  --primary-color: #d40063;  /* Primary pink */
  --accent-color: #200079;   /* Accent purple */
  --text-dark: #333;
  --text-light: #666;
  --bg-light: #f8f9fa;
  --white: #ffffff;
}
```

### Typography
The theme uses the "Segoe UI" font family by default. To change it, edit in `style.css`:

```css
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
```

## Support

For issues or questions:
- Email: hello@pjdesignsva.com
- Phone: 540-459-8307 or 202-744-4898

## Credits

- Font Awesome icons: https://fontawesome.com/
- Advanced Custom Fields: https://www.advancedcustomfields.com/

## License

This theme is proprietary and licensed for use by PJ Designs only.

---

**Version:** 1.0.0
**Author:** PJ Designs
**Last Updated:** December 2024
