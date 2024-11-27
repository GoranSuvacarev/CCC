$(document).ready(function() {
    let selectedCategory = null;
    let product1Selected = false;

    function attachSearchBehavior(inputId, suggestionListId, isSecondInput = false) {
        const input = $(`#${inputId}`);
        const suggestionList = $(`#${suggestionListId}`);
        const compareButton = $('input[type="submit"]');

        // Initially disable the compare button
        compareButton.prop('disabled', true);

        // Handle both keyup and input events
        input.on('keyup input', function() {
            const searchTerm = $(this).val();

            // Handle empty first input
            if (inputId === 'product1' && searchTerm === '') {
                $('#secondProductBox').addClass('d-none');
                $('#product2').val('');
                $('#suggestions2').empty();
                selectedCategory = null;
                product1Selected = false;
                compareButton.prop('disabled', true);
                return;
            }

            // Don't search for very short terms
            if (searchTerm.length < 2) {
                suggestionList.empty();
                return;
            }

            // Prepare search parameters
            const searchParams = { term: searchTerm };
            if (isSecondInput && selectedCategory) {
                searchParams.category = selectedCategory;
            }

            // Perform search
            $.get('/search', searchParams, function(data) {
                suggestionList.empty();

                data.forEach(function(item) {
                    const li = $('<li>')
                        .addClass('list-group-item list-group-item-action')
                        .text(item.value)
                        .css('cursor', 'pointer');

                    li.on('click', function() {
                        input.val(item.value);
                        suggestionList.empty();

                        if (inputId === 'product1') {
                            selectedCategory = item.category;
                            product1Selected = true;
                            $('#secondProductBox').removeClass('d-none');
                            $('#product2').val('');
                            $('#suggestions2').empty();
                        } else if (inputId === 'product2') {
                            // Only enable compare button if both products are selected
                            compareButton.prop('disabled', false);
                        }
                    });

                    suggestionList.append(li);
                });
            });
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest(`#${inputId}, #${suggestionListId}`).length) {
                suggestionList.empty();
            }
        });
    }

    // Initialize search for both inputs
    attachSearchBehavior('product1', 'suggestions1');
    attachSearchBehavior('product2', 'suggestions2', true);
});