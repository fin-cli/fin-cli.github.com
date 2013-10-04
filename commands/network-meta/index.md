---
layout: default
title: 'wp network-meta'
---

`wp network-meta` - Manage network custom fields.

### OPTIONS

&lt;id&gt;
: The network id (usually 1).

\--format=json
: Encode/decode values as JSON.

### EXAMPLES

    # get a list of super-admins
    wp network-meta get 1 site_admins

### SUBCOMMANDS

<table>
	<thead>
	<tr>
		<th>Name</th>
		<th>Description</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td><a href="/commands/network-meta/add/">add</a></td>
			<td>Add a meta field.</td>
		</tr>
		<tr>
			<td><a href="/commands/network-meta/delete/">delete</a></td>
			<td>Delete a meta field.</td>
		</tr>
		<tr>
			<td><a href="/commands/network-meta/get/">get</a></td>
			<td>Get meta field value.</td>
		</tr>
		<tr>
			<td><a href="/commands/network-meta/update/">update</a></td>
			<td>Update a meta field.</td>
		</tr>
	</tbody>
</table>
