<div class="social-auth-links text-center mb-3">
    <p>- {{__("OR")}} -</p>
    <a href="{{ route('social_auth', ['driver' => 'facebook']) }}" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i> {{__("Sign in using Facebook")}}
    </a>
    <a href="{{ route('social_auth', ['driver' => 'google']) }}"
       class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i> {{__("Sign in using Google+")}}
    </a>
    <a href="{{ route('social_auth', ['driver' => 'github']) }}"
       class="btn btn-block btn-outline-secondary">
        <i class="fab fa-github-alt mr-2"></i> {{ __("Sign in using Github") }}
    </a>
</div>
<!-- /.social-auth-links -->
