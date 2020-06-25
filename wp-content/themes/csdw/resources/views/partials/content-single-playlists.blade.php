<article @php post_class('with-breadcrumbs') @endphp>

  @include('partials.global.post-header', [ 'header_settings' => $header_settings ])

  @include('partials.sections.tactics', [ 'tactics_section' => $tactics_section ])

  @include('partials.sections.posts', [ 'posts_section' => $posts_section ])

</article>
