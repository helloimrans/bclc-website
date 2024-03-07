<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="table-responsive">
        <table class="table table-bordered table-sm mt-3">
            <tr>
                <th class="bg-light">Act No</th>
                <td>{{ $law->act_no }}</td>
                <th class="bg-light">Part</th>
                <td>{{ $law->total_part }}</td>
            </tr>
            <tr>
                <th class="bg-light">Act Year</th>
                <td>{{ $law->act_year }}</td>
                <th class="bg-light">Chapter</th>
                <td>{{ $law->total_chapter }}</td>
            </tr>
            <tr>
                <th class="bg-light">Act Date</th>
                <td>{{ \Carbon\Carbon::parse($law->act_date)->format(' d M, Y') }}</td>
                <th class="bg-light">Section</th>
                <td>{{ $law->total_section }}</td>
            </tr>
            <tr>
                <th class="bg-light">Amendment</th>
                <td>{{ \Carbon\Carbon::parse($law->last_amendment)->format(' d M, Y') }}</td>
                <th class="bg-light">Schedule</th>
                <td>{{ $law->total_schedule }}</td>
            </tr>
            <tr>
                <th class="bg-light"></th>
                <td></td>
                <th class="bg-light">Form</th>
                <td>{{ $law->total_form }}</td>
            </tr>
        </table>
    </div>
    <p>{!! $law->description !!}</p>
    
    @if ($law->format == 'part_chapter_section')
        @include('frontend.laws_and_rules.view.main_law.part_chapter_section', ['law' => $law])
    @elseif ($law->format == 'part_section')
        @include('frontend.laws_and_rules.view.main_law.part_section', ['law' => $law])
    @elseif ($law->format == 'chapter_section')
        @include('frontend.laws_and_rules.view.main_law.chapter_section', ['law' => $law])
    @endif
</div>
