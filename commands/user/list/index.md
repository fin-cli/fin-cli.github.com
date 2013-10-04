---
layout: default
title: 'wp user list'
---

`wp user list` - List users.

### OPTIONS

[\--role=&lt;role&gt;]
: Only display users with a certain role.

[\--&lt;field&gt;=&lt;value&gt;]
: Filter by one or more fields. For accepted fields, see get_users().

[\--field=&lt;field&gt;]
: Prints the value of a single field for each user.

[\--fields=&lt;fields&gt;]
: Limit the output to specific object fields. Defaults to ID,user_login,display_name,user_email,user_registered,roles

[\--format=&lt;format&gt;]
: Output list as table, CSV, JSON, or simply IDs. Defaults to table.

### EXAMPLES

    wp user list --field=ID

    wp user list --role=administrator --format=csv

    wp user list --fields=display_name,user_email --format=json

