Hello {{ $user->username }},

Recently a new user registered with a status of manager. With manager status you can specify Artist/Bands that you manage. He has specified that he manages you as an artist/band. If you have granted access to

Manger Info
	name : {{ $manager->first_name}} {{ $manager->last_name }}
	username: {{ $manager->username }}

to manage you please verify by <a href="{{ $siteUrl}}/verify/artist/{{ $hash }}"> Clicking here </a>