         @php use \App\Http\Controllers\GlobalController; @endphp
         @php  $pages = GlobalController::pages();@endphp
         @extends('layouts.app')

         @section('main')
          @php $locale = session()->get('locale');  @endphp
             <div data-barba="container">
                 <div class="flex flex-col h-screen mx-auto">
                     <div class="p-3 pt-8 lg:mx-16 md:pt-20">
                         <div class="flex flex-row items-center pt-2">
                             <a href="/" class="prevent"> <i
                                     class="ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
                         </div>
                          @if ($locale == 'de')
                            <h1 class="text-3xl font-bold text-gray-900 text-center">{{ $pages[5]->title }}</h1>
                         @else
                            <h1 class="text-3xl font-bold text-gray-900 text-center">{{ $pages[0]->title }}</h1>
                            @endif
                         <div class="mx-8 page all-initial pt-8">
                         @php
                          if ($locale == 'de'){
                                echo $pages[5]->content;
                           } else {
                                echo $pages[0]->content;
                           }
                          @endphp
                         </div>
                     </div>
                 </div>
                 <style>
                     .page>h1 {
                         font-size: 2.2em;
                     }

                     .page>h2 {
                         font-size: 2.0em;
                     }

                     .page>h3 {
                         font-size: 1.8em;
                     }

                     .page>h4 {
                         font-size: 1.6em;
                     }

                     .page>h5 {
                         font-size: 1.4em;
                     }

                     .page>p {
                         display: block;
                         margin-top: 1em;
                         margin-bottom: 1em;
                         margin-left: 0;
                         margin-right: 0;
                     }

                     .page>table {
                         display: table;
                         border-collapse: separate;
                         border-spacing: 2px;
                         border-color: gray;
                     }

                     .page>td {
                         display: table-cell;
                         vertical-align: inherit;
                     }

                     .page>tbody {
                         display: table-row-group;
                         vertical-align: middle;
                         border-color: inherit;
                     }

                     .page>tr {
                         display: table-row;
                         vertical-align: inherit;
                         border-color: inherit;
                     }

                     .page>col {
                         display: table-column;
                     }

                     .page>colgroup {
                         display: table-column-group;
                     }

                     .page>datalist {
                         display: none;
                     }

                     .page>a:link {
                         color: #0000FF;
                         text-decoration: underline;
                         cursor: auto;
                     }

                     .page>a:visited {
                         color: #0000FF;
                         text-decoration: underline;
                         cursor: auto;
                     }

                     .page>fieldset {
                         display: block;
                         margin-left: 2px;
                         margin-right: 2px;
                         padding-top: 0.35em;
                         padding-bottom: 0.625em;
                         padding-left: 0.75em;
                         padding-right: 0.75em;

                     }

                     .page>ol {
                         display: block;
                         list-style-type: decimal;
                         margin-top: 1em;
                         margin-bottom: 1em;
                         margin-left: 0;
                         margin-right: 0;
                         padding-left: 40px;
                     }

                     .page>hr {
                         display: block;
                         margin-top: 0.5em;
                         margin-bottom: 0.5em;
                         margin-left: auto;
                         margin-right: auto;
                         overflow: hidden;
                         border-style: inset;
                         border-width: 1px;
                     }

                     .page>ul {
                         display: block;
                         list-style-type: disc;
                         margin-top: 1em;
                         margin-bottom: 1 em;
                         margin-left: 0;
                         margin-right: 0;
                         padding-left: 40px;
                     }

                     .page>li {
                         display: list-item;
                         text-align: -webkit-match-parent;

                     }

                     .page>p {
                         display: block;
                         margin-top: 1em;
                         margin-bottom: 1em;
                         margin-left: 0;
                         margin-right: 0;
                     }


                     .page>th {
                         display: table-cell;
                         vertical-align: inherit;
                         font-weight: bold;
                         text-align: center;
                     }

                     .page>thead {
                         display: table-header-group;
                         vertical-align: middle;
                         border-color: inherit;
                     }

                     .page>u {
                         text-decoration: underline;
                     }

                     .page>tfoot {
                         display: table-footer-group;
                         vertical-align: middle;
                         border-color: inherit;
                     }

                     .page>sup {
                         vertical-align: super;
                         font-size: smaller;
                     }


                     .page>sub {
                         vertical-align: sub;
                         font-size: smaller;
                     }

                     .page>summary {
                         display: block;
                     }

                     .page>q {
                         display: inline;
                     }
                 </style>
             @endsection
