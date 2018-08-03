<!-- footer content -->
<footer>
    <div class="pull-right">
         {!! date('Y') !!}, <a href="">{!! config()->get('app.name') !!}</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{!! asset('assets/vendors/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap -->
<script src="{!! asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('assets/vendors/fastclick/lib/fastclick.js') !!}"></script>
<!-- NProgress -->
<script src="{!! asset('assets/vendors/nprogress/nprogress.js') !!}"></script>

<!-- Custom Theme Scripts -->
<script src="{!! asset('assets/js/custom.min.js') !!}"></script>

<script src="{!! asset('assets/js/onload.js') !!}"></script>
</body>
</html>