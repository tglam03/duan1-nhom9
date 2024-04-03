<script>
    // Client type Panel
    $('input[name="client_type"]').on("click", function() {
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
</script>
