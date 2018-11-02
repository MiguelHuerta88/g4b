<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel">Sign up for a Gigs for Bands account</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tier">
                    <div class="img"><img src="{{ asset('images/artist.jpg') }}"></div>
                    <div class="text">
                        <a href="/signup/artist" class="btn artist btn-common btn-block">
                                Sign up as artist
                        </a>
                        <div class="description">
                            Easily modify profile. Access music stats. Music chart reporting and more.
                        </div>
                    </div>
                </div>
                <div class="tier">
                    <div class="img"><img src="{{ asset('images/manager.png') }}"></div>
                    <div class="text">
                        <a href="/signup/manager" class="btn manager btn-common btn-block">
                                Sign up as manager
                        </a>
                        <div class="description">
                            Ability to manager artist/users already on Gigs for Bands. Edit profile(s). Easily
                            access artist stats. Music chart reporting and more.
                        </div>
                    </div>
                </div>
                <div class="tier">
                    <div class="img"><img src="{{ asset('images/coordinator.jpg') }}"></div>
                    <div class="text">
                        <a href="/signup/coordinator" class="btn coordinator btn-common btn-block">
                            Sign up as event coordinator
                        </a>
                        <div class="description">
                            List events. Ability to contact artist/managers regarding events.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>