---
layout: default
title: 'wp media import'
---

`wp media import` - Create attachments from local files or from URLs.

### OPTIONS

&lt;file&gt;
: Path to file or files to be imported. Supports the glob(3) capabilities of the current shell.
    If file is recognized as a URL (for example, with a scheme of http or ftp), the file will be
    downloaded to a temp file before being sideloaded.

\--post_id=&lt;post_id&gt;
: ID of the post to attach the imported files to

\--title=&lt;title&gt;
: Attachment title (post title field)

\--caption=&lt;caption&gt;
: Caption for attachent (post excerpt field)

\--alt=&lt;alt_text&gt;
: Alt text for image (saved as post meta)

\--desc=&lt;description&gt;
: &quot;Description&quot; field (post content) of attachment post

\--featured_image
: If set, set the imported image as the Featured Image of the post its attached to.

### EXAMPLES

    # Import all jpgs in the current user's &quot;Pictures&quot; directory, not attached to any post
    wp media import ~/Pictures/**\/*.jpg

    # Import a local image and set it to be the post thumbnail for a post
    wp media import ~/Downloads/image.png --post_id=123 --title=&quot;A downloaded picture&quot; --featured_image

    # Import an image from the web
    wp media import http://s.wordpress.org/style/images/wp-header-logo.png --title='The WordPress logo' --alt=&quot;Semantic personal publishing&quot;

