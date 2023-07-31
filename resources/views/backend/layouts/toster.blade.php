@if (session()->has('delete_status'))
    <script>
        let notifier = new AWN();
        notifier.info("{{ session('delete_status') }}", {durations: {info: 3000}})
    </script>
@endif

@if (session()->has('create_status'))
    <script>
        let notifier = new AWN();
        notifier.info("{{ session('create_status') }}", {durations: {info: 3000}})
    </script>
@endif

@if (session()->has('update_status'))
    <script>
        let notifier = new AWN();
        notifier.info("{{ session('update_status') }}", {durations: {info: 3000}})
    </script>
@endif