---
layout: post
author: danielbachhuber
title: RESTful FIN-CLI - What I've been hacking on
---

Let me just say — Thursday, February 4th was [pretty darn demoralizing](https://twitter.com/Krogsgard/status/695634320401285121). I spent a huge amount of time in January towards the FIN REST API in preparation for what I wanted to do on the command line, and a lot of momentum / inspiration / general good feelings were destroyed in that meeting. As such, I spent much of February and March working on FIN-CLI features unrelated to the FIN REST API (e.g. [package management](https://fin-cli.org/commands/package/)).

But, I'm back in the saddle. Because I'm 2/3 of the way through one of those fancy FIN REST API + React FinPress applications, I'm running into dozens of ways I want to be able to make FinPress more efficiently. And of course, this means doing it on the command line.

Before we proceed: most of the, if not all, RESTful FIN-CLI features have required under the hood changes to FIN-CLI. You'll want to `fin cli update --nightly` to play with this new functionality locally. Once you've done so, you can `fin package install danielbachhuber/fin-rest-cli` to install the latest.

### Use `--debug` and `--debug=rest` to profile your REST endpoints

REST APIs are all about speed. Milliseconds matter, and every one you manage to shave off will have a real world impact on user experience.

To make it *much*, much easier to understand how many queries your endpoint is performing, and how long they take, I've added some lightweight profiling to RESTful FIN-CLI.

Use `--debug` to get a summary of your queries for any command.

    $ fin rest post list --debug
    Debug (rest): REST command executed 7 queries in 0.001954 seconds. Use --debug=rest to see all queries. (1.446s)
    +----+-----------------------------+
    | id | title                       |
    +----+-----------------------------+
    | 1  | {"rendered":"Hello world!"} |
    +----+-----------------------------+

Use `--debug=rest` to get the full list of queries executed.

    $ fin rest post list --fields=id,title --debug=rest
    Debug: REST command executed 7 queries in 0.001696 seconds. Ordered by slowness, the queries are:
    1:
      - 0.000291 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_Query->query, FIN_Query->get_posts
      - SELECT SQL_CALC_FOUND_ROWS  fin_posts.ID FROM fin_posts  WHERE 1=1  AND fin_posts.post_type = 'post' AND (fin_posts.post_status = 'publish')  ORDER BY fin_posts.post_date DESC LIMIT 0, 10
    2:
      - 0.000257 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_Query->query, FIN_Query->get_posts, FIN_Query->set_found_posts
      - SELECT FOUND_ROWS()
    3:
      - 0.000256 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_REST_Posts_Controller->prepare_item_for_response, setup_postdata, FIN_Query->setup_postdata, get_userdata, get_user_by, FIN_User::get_data_by
      - SELECT * FROM fin_users WHERE ID = '1'
    4:
      - 0.000244 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_REST_Posts_Controller->prepare_item_for_response, setup_postdata, FIN_Query->setup_postdata, get_userdata, get_user_by, FIN_User->init, FIN_User->for_blog, FIN_User->_init_caps, get_user_meta, get_metadata, update_meta_cache
      - SELECT user_id, meta_key, meta_value FROM fin_usermeta WHERE user_id IN (1) ORDER BY umeta_id ASC
    5:
      - 0.000233 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_Query->query, FIN_Query->get_posts, _prime_post_caches
      - SELECT fin_posts.* FROM fin_posts WHERE ID IN (1)
    6:
      - 0.000209 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_Query->query, FIN_Query->get_posts, _prime_post_caches, update_post_caches, update_object_term_cache, fin_get_object_terms
      - SELECT t.*, tt.*, tr.object_id FROM fin_terms AS t INNER JOIN fin_term_taxonomy AS tt ON tt.term_id = t.term_id INNER JOIN fin_term_relationships AS tr ON tr.term_taxonomy_id = tt.term_taxonomy_id  WHERE tt.taxonomy IN ('category', 'post_tag', 'post_format') AND tr.object_id IN (1) ORDER BY t.name ASC
    7:
      - 0.000206 seconds
      - FIN_REST_Posts_Controller->get_items, FIN_Query->query, FIN_Query->get_posts, _prime_post_caches, update_post_caches, update_postmeta_cache, update_meta_cache
      - SELECT post_id, meta_key, meta_value FROM fin_postmeta WHERE post_id IN (1) ORDER BY meta_id ASC
     (1.598s)
    +----+-----------------------------+
    | id | title                       |
    +----+-----------------------------+
    | 1  | {"rendered":"Hello world!"} |
    +----+-----------------------------+

Profiling works for any CRUD operation.

    $ fin rest post create --title="Test post" --user=daniel --debug
    Debug (rest): REST command executed 28 queries in 0.023962 seconds. Use --debug=rest to see all queries. (1.777s)
    Success: Created post.
    $ fin rest post update 3 --content="Foo bar" --user=daniel --debug
    Debug (rest): REST command executed 31 queries in 0.023309 seconds. Use --debug=rest to see all queries. (1.634s)
    Success: Updated post.

Hopefully this feature becomes an invaluable part of your REST endpoint development process, as it has mine. Hit me with feedback on [its GitHub issue](https://github.com/danielbachhuber/fin-rest-cli/issues/42).

### Use `fin rest * edit` to edit a resource in your system editor

Most people probably don't know this, but you can use `fin post edit <id>` to edit post content in your system editor (e.g. vim). Now, with `fin rest * edit`, you can edit any REST resource in your system editor.

    $ fin rest post edit 3 --user=daniel

When you run `fin rest * edit`, RESTful FIN-CLI fetches the resource, transforms it into a YAML document, and puts it in your system editor:

    ---
    date: 2016-04-14T14:02:57
    date_gmt: null
    password:
    slug:
    status: draft
    title:
      raw: Test post
      rendered: Test post
    content:
      raw: Foo bar
      rendered: |
        |
            <p>Foo bar</p>
    excerpt:
      raw:
      rendered: |
        |
            <p>Foo bar</p>
    author: 1
    featured_media: 0
    comment_status: open
    ping_status: open
    sticky: false
    format: standard
    categories:
      - 1
    tags: [ ]

If you make changes to any of the fields, then the command sends it back to FinPress (through the FIN REST API) to update.

On FinPress installs that support Basic Auth, editing also works over HTTP:

    $ fin --http=http://daniel:daniel@finpress-develop.dev rest post edit 1

Et, voila.

### Get involved!

I'd love your input on the dozens of ideas I have for a more RESTful FIN-CLI:

* Render the help docs in formats like API Blueprint and Swagger [[#36](https://github.com/danielbachhuber/fin-rest-cli/issues/36)]
* Introduce `fin rest * generate` to generate mock data in the format your application expects [[#55](https://github.com/danielbachhuber/fin-rest-cli/issues/55)].
* Introduce `fin rest * diff` to be able to diff the state of two different FinPresses, a la [Dictator](https://github.com/danielbachhuber/dictator) [[#56](https://github.com/danielbachhuber/fin-rest-cli/issues/56)].
* Figure out an elegant aliases implementation, so `--http=http://daniel:daniel@finpress-develop.dev` becomes `@findev` [[#2039](https://github.com/fin-cli/fin-cli/issues/2039)]

And I want to hear your ideas too! As well as any feedback, questions, or violent dissent. [Let's chat on GitHub](https://github.com/danielbachhuber/fin-rest-cli/issues).
