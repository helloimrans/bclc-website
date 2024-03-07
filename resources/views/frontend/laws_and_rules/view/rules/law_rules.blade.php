<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="table-responsive">
        <table class="table table-bordered table-sm mt-3">
            <tr>
                <th class="bg-light">Rule No</th>
                <td>{{ $law->rules_no }}</td>
                <th class="bg-light">Part</th>
                <td>{{ $law->rules_total_part }}</td>
            </tr>
            <tr>
                <th class="bg-light">Rule Year</th>
                <td>{{ $law->rule_year }}</td>
                <th class="bg-light">Chapter</th>
                <td>{{ $law->rules_total_chapter }}</td>
            </tr>
            <tr>
                <th class="bg-light">Rule Date</th>
                <td>{{ \Carbon\Carbon::parse($law->rules_date)->format(' d M, Y') }}</td>
                <th class="bg-light">Section</th>
                <td>{{ $law->rules_total_section }}</td>
            </tr>
            <tr>
                <th class="bg-light">Amendment</th>
                <td>{{ \Carbon\Carbon::parse($law->rules_last_amendment)->format(' d M, Y') }}
                </td>
                <th class="bg-light">Schedule</th>
                <td>{{ $law->rules_total_schedule }}</td>
            </tr>
            <tr>
                <th class="bg-light"></th>
                <td></td>
                <th class="bg-light">Form</th>
                <td>{{ $law->rules_total_form }}</td>
            </tr>
        </table>
    </div>
    <p>{!! $law->description !!}</p>

    @if ($law->format == 'part_chapter_section')
        @include('frontend.laws_and_rules.view.rules.part_chapter_section', ['law' => $law])
    @elseif ($law->format == 'part_section')
        @include('frontend.laws_and_rules.view.rules.part_section', ['law' => $law])
    @elseif ($law->format == 'chapter_section')
        @include('frontend.laws_and_rules.view.rules.chapter_section', ['law' => $law])
    @endif
</div>
