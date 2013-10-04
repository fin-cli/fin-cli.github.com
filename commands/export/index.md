---
layout: default
title: 'wp export'
---

`wp export` - Export content to a WXR file.

### OPTIONS

[\--dir=&lt;dirname&gt;]
: Full path to directory where WXR export files should be stored. Defaults
to current working directory.

[\--skip_comments]
: Don't export comments.

[\--file_item_count=&lt;count&gt;]
: Break export into files with N posts.

[\--verbose]
: Show more information about the process on STDOUT.

### FILTERS

[\--start_date=&lt;date&gt;]
: Export only posts newer than this date, in format YYYY-MM-DD.

[\--end_date=&lt;date&gt;]
: Export only posts older than this date, in format YYYY-MM-DD.

[\--post_type=&lt;post_type&gt;]
: Export only posts with this post_type.

[\--post__in=&lt;pid&gt;]
: Export all posts specified as a comma-separated list of IDs.

[\--author=&lt;login/id&gt;]
: Export only posts by this author.

[\--category=&lt;category-id&gt;]
: Export only posts in this category.

[\--post_status=&lt;status&gt;]
: Export only posts with this status.

### EXAMPLES

    wp export --dir=/tmp/ --user=admin --post_type=post --start_date=2011-01-01 --end_date=2011-12-31

    wp export --dir=/tmp/ --post__in=123,124,125

