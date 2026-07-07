
# README

## About

Uses [Photoswipe](https://photoswipe.com/) to display picture galleries on your
Drupal website. This Javascript lightbox library offers very nice mobile
browsing features (in particular swiping to the next picture)!


## Installation

### Manual Installation

- Require the module, e.g. via composer: "composer require drupal/photoswipe"
- Install the module
- Download the "PhotoSwipe-5.4.4" zip file
- Unzip and place the contents of the unzipped "PhotoSwipe-5.4.4" folder
into "library/photoswipe" folder so that the folder structure is:
"library/photoswipe/dist/photoswipe.js"
- Check the status report for errors

### Alternative composer installation (recommended)

- Require the module, e.g. via composer: "composer require drupal/photoswipe"
- Install the module
- Enable usage of third-party libraries using composer, see
[here](https://www.drupal.org/docs/develop/using-composer/manage-dependencies#third-party-libraries) for an explanation.
- Require the photoswipe library using
`composer require bower-asset/photoswipe:^5`
- Check your status report

Then simply configure your image fields to use photoswipe as their field display
formatter.

Note: If you would like to use the "Photoswipe Responsive" display formatter,
please enable the core "Responsive Image" module first.


## Usage

### Photoswipe images in entities
After adding an image or media entity field to any content type
(e.g. 'article'), you can select 'PhotoSwipe' or 'Photoswipe Responsive' as a
display mode in Structure -> Content types -> MyContentType in the tab
'Manage display'.

### Photoswipe images in Views
To use photoswipe in views you can either change the Row style options "View
mode" to the view mode display formatter, you have the photoswipe display
formatter applied to, or you can add a media / image field, where you set the
'Photoswipe' or 'Photoswipe Responsive' display mode similar to
"Images in entities".

By default, using the Photoswipe formatter on a views field will open single 
images (not a gallery). To have a gallery of images, you need to set a 
"photoswipe-gallery" class on any wrapper.

For example: If you have an image field with multiple values and you want to 
group them, set this class on the field wrapper.
If you have multiple image fields and you want to group them all, set the 
class on the views-row wrapper (this may or may not be possible depending on 
the display plugin used).

See the Views documentation page section
[Customize the output style of a view field or list > Customize a view list](https://www.drupal.org/docs/8/core/modules/views/customize-the-output-style-of-a-view-field-or-list#s-customize-a-view-list)
for details on how to add a class in a View.

### Photoswipe images in twig templates:
To use the photoswipe formatter for images inside a custom twig template, you
can use the `attach_photoswipe()` twig function.
Simply make sure:
- You use the function in the correct context.
- The anchor tag (`<a>`) wrapping the image needs the "photoswipe" class to mark it as photoswipe trigger

Here is an example on how to use the `attach_photoswipe()` twig function inside.
a twig template:
~~~
<div class="myContext">
  {{ attach_photoswipe() }}
  <div class="photoswipe-gallery">
    <a href="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" class="photoswipe">
      <img src="https://cdn.photoswipe.com/photoswipe-demo-images/photos/2/img-2500.jpg" alt="Beautiful picture" />
    </a>
  </div>
</div>
~~~
You can also override the photoswipe settings through the attach function as
follows:
~~~
{{ attach_photoswipe({'bgOpacity': 0.2}) }}
~~~

### Combining Multiple Fields into a Shared Gallery
By default, each field using the Photoswipe formatter gets wrapped in its own `photoswipe-gallery` class. If you want to combine images from multiple fields (or multiple paragraphs/blocks) into a single, shared gallery, you can check the **Remove photoswipe-gallery wrapper class** option in each field formatter's settings.

Once the default wrapper class is disabled, you must manually wrap the fields in a container that has the `photoswipe-gallery` class. Here are a few ways to do this.
*If you don't add one, `js/prepare-galleries.js` will add a fallback around each image!*

#### 1. Using the Fences Module
If you are using the [Fences](https://www.drupal.org/project/fences) module to customize your field markup, you can:
- Edit the parent entity/paragraph containing the fields.
- Configure the Fences wrapper settings on the container element or parent field.
- Add `photoswipe-gallery` to the custom CSS classes of the wrapper element.

#### 2. Manually in Twig Templates (Theme)
You can wrap the fields in your custom twig template (e.g., `paragraph--my-gallery.html.twig` or `node--article.html.twig`).

```twig
{# Wrap multiple fields into a single shared gallery #}
<div class="photoswipe-gallery my-custom-gallery-layout">
  {{ content.field_gallery_images_1 }}
  {{ content.field_gallery_images_2 }}
</div>
```

#### 3. Using the Views Module
If you are displaying multiple fields in a View:
- Disable the default wrapper class on the fields.
- In your View's format settings (e.g., Grid or HTML List), add `photoswipe-gallery` to the Row class or the Inner class.
- Alternatively, rewrite the output of a field or use a custom Views template to wrap multiple fields in a `<div class="photoswipe-gallery">` container.

### Download Button
The Photoswipe formatter includes a **Show download button** setting that adds a
download button to the PhotoSwipe toolbar.

If you enable the **Remove photoswipe-gallery wrapper class** setting and
provide your own `photoswipe-gallery` wrapper instead, you must add the
`data-show-download-button` data attribute to that wrapper yourself to show
the download button.
