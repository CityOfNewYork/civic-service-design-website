<article @php post_class() @endphp>

  @include('partials.pages.single.projects.header', [ 'icons' => $icons, 'dates' => $dates ])

  <div class="project-single-content section-pink-30t chameleonic">

    @include('partials.pages.single.projects.first_section_question', [ 'first_section_question' => $first_section_question ])


    <div class="project-main-wrapper section chameleonic">
      <div class="container">
        <div class="row">
          <div class="project-main-content html-content">
            @include('partials.pages.single.projects.main_content', ['main_content' => $main_content])
          </div>

          <div class="project-main-sidebar">
            @include('partials.pages.single.projects.numbers_sidebar', [ 'numbers_sidebar' => $numbers_sidebar ])
          </div>
        </div>
      </div>
    </div>


    @include('partials.pages.single.projects.what_we_made', [ 'what_we_made_section' => $what_we_made_section ])

    @include('partials.pages.single.projects.how_we_worked', [ 'how_we_worked_section' => $how_we_worked_section ])

    @include('partials.pages.single.projects.project_partners_section', [ 'project_partners_section' => $project_partners_section ])

  </div>

  @include('partials.sections.related', [ 'related_section' => $related_section ])

</article>
