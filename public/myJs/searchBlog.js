
$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var searchInput = $(this).val();

        $.ajax({
            url: "{{ route('blog.search') }}",
            method: 'GET',
            data: { searchInput: searchInput },
            dataType: 'json',
            success: function(response) {
                console.log(response);

                if (response.pots && response.posts.data.length > 0) {
                    var html = '';
                    $.each(response.results, function(index, blog) {
                        var html = '';
                        html += '<div class="col-sm-6 col-lg-4 col-xl-6 mb-8">';
                        html += '<div class="post-item">';
                        // html += '<a href="' + '{{ route('blog.details', $blog->id) }}' + '" class="thumb">';
                        html += '<img src="' + '{{ asset($blog->picture) }}' + '" width="370" height="320" alt="' + blog.picture + '">';
                        html += '</a>';
                        html += '<div class="content">';
                        // html += '<a class="post-category"  href="' + '{{ route('blog.details', $blog->id) }}' + '">' + blog.category + '</a>';
                        // html += '<h4 class="title"><a href="' + '{{ route('blog.details', $blog->id) }}' + '">' + blog.title + '</a></h4>';
                        html += '<ul class="meta">';
                        html += '<li class="post-date">' + blog.created_at + '</li>';
                        html += '</ul>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                        // Append the generated HTML to the search results container
                        $('#searchResults').append(html);
                    });
                    $('#searchResults').html(html);
                } else {
                    $('#searchResults').html('<p>No products found.</p>');
                }

                //
                $('#searchResults').removeClass('d-none');


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
