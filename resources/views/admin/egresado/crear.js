$("#crear").validate({
    rules: {
        // simple rule, converted to {required:true}
        matricula: "required",
        // compound rule
        email: {
            required: true,
            email: true
        }
    }
});