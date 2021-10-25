        </div>

        <div id="app-foot" class="w-100 bg-dark py-3">
            <div class="container-sm">
                töfte footer
            </div>
        </div>
    </body>

    <script src="http://localhost:8080/assets/set/bootstrap-v5/js/bootstrap.bundle.min.js">
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</html>