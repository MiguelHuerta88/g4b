Hello {{ $user->username}},

Thank you for joining the Gigs for Bands family. Before you can do anything on the site 
you must first verify your email using this link

<a href="{{ $siteUrl}}/verify/{{ $user->verify_hash }}" target="_blank">Click to verify</a>