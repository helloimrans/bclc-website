@if (count($sections) > 0)
    @foreach ($sections as $section)
        <a id="search_click_{{ $section->id }}" onClick="function test(){
            document.getElementById('search').value = null;

            let search =  document.getElementById('search_click_{{ $section->id }}').innerText;


            document.getElementById('search').value = search;
            document.getElementById('result').style.display = 'none';

          } test();" href="javascript:;">{{ $section->title }}</a>
    @endforeach
@endif

