<div class="laws-header-one text-center mb-4 pb-2">
    <h5>{{ $law->title }}</h5>
    {{-- <p>( ACT NO. {{ $law->act_no }} OF {{ $law->act_year }} )</p> --}}
    <a href="{{ route('laws.rules.details', $law->slug) }}">Click here for In-depth-details</a>
</div>
<div class="laws-header-two">
    <div class="row">
        <div class="col-md-4 align-self-center">
            <div class="laws-back">
                <a href="{{ url()->previous() }}"><i class="fa fa-angle-left"></i> Back</a>
            </div>

        </div>
        <div class="col-md-5">
            <div class="service-search section-search">
                <form action="{{ route('section.form.search') }}" method="GET">
                    <input type="hidden" name="law_id" value="{{ $law->id }}" required>
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" id="search"
                            name="search" placeholder="Search..." autocomplete="off" required>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn service-nsbtn"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="section-ajax" id="result" style="display:none">
                    <div id="memList">

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 align-self-center">
            <div class="laws-date text-right laws-back">
                <a href="javascript:;"><i class="fa fa-eye"></i> {{ $law->total_views }}</a>
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
