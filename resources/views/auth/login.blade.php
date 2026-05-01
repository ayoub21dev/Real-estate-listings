@extends('layouts.public')

@section('title', 'Sign In - RealEstate Pro')
@section('meta_description', 'Sign in to RealEstate Pro to manage inquiries and saved property activity.')

@section('content')
    <section class="bg-[#f7f8f5] py-16 sm:py-20">
        <div class="section-shell">
            <div class="mx-auto grid max-w-5xl overflow-hidden rounded-lg border border-[#10201d]/10 bg-white shadow-[0_18px_45px_rgba(16,32,29,0.08)] lg:grid-cols-[0.85fr_1.15fr]">
                <div class="relative hidden min-h-[36rem] bg-[#10201d] lg:block">
                    <img
                        class="absolute inset-0 h-full w-full object-cover opacity-60"
                        src="https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=1200&q=85"
                        alt="Calm modern interior"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#10201d] via-[#10201d]/40 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8">
                        <p class="font-display text-4xl leading-tight text-white">Manage the work behind the shortlist.</p>
                        <p class="mt-4 text-sm leading-6 text-white/70">A quiet workspace for inquiries, saved properties, and listing activity.</p>
                    </div>
                </div>

                <div class="p-6 sm:p-10 lg:p-12">
                    <div class="mb-8">
                        <div class="mb-5 flex items-center gap-4">
                            <span class="eyebrow-line"></span>
                            <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">Account</span>
                        </div>
                        <h1 class="font-display text-4xl font-normal tracking-tight text-[#10201d]">Sign in</h1>
                        <p class="mt-3 text-sm leading-6 text-[#66736d]">
                            Need access? <a href="{{ route('contact') }}" class="font-black text-[#0f5e4d] hover:text-[#0b4b3e]">Contact the team</a>.
                        </p>
                    </div>

                    <form class="space-y-5" action="#" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="field-label">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required class="ui-field">
                        </div>

                        <div>
                            <label for="password" class="field-label">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="ui-field">
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <label class="flex items-center gap-3 text-sm font-bold text-[#53625c]">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-[#dfe5df] text-[#0f5e4d] focus:ring-[#0f5e4d]">
                                Remember me
                            </label>
                            <a href="#" class="text-sm font-black text-[#0f5e4d] hover:text-[#0b4b3e]">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn-primary w-full">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
