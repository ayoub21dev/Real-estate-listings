@extends('layouts.public')

@section('title', 'Contact UrbanKey')
@section('meta_description', 'Contact UrbanKey for property inquiries, viewing requests, and real estate support.')

@section('content')
    <section class="bg-white py-16 sm:py-20">
        <div class="section-shell">
            <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-end">
                <div>
                    <div class="mb-6 flex items-center gap-4">
                        <span class="eyebrow-line"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-[#8a7a61]">Contact</span>
                    </div>
                    <h1 class="font-display text-5xl font-normal leading-tight tracking-tight text-[#10201d] sm:text-6xl">
                        Tell us what you want to visit.
                    </h1>
                    <p class="mt-6 max-w-xl text-base leading-7 text-[#66736d]">
                        Send the property, city, or budget you are working with and our team will help you move toward a useful shortlist.
                    </p>
                </div>
                <img
                    src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1400&q=85"
                    alt="Modern home exterior with clean architectural lines"
                    class="h-72 w-full rounded-lg object-cover sm:h-80"
                >
            </div>
        </div>
    </section>

    <section class="bg-[#f7f8f5] py-16 sm:py-20">
        <div class="section-shell">
            <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr]">
                <aside class="space-y-5">
                    @foreach([
                        ['label' => 'Office', 'value' => '123 Business Avenue, Tech City'],
                        ['label' => 'Phone', 'value' => '+1 (555) 123-4567'],
                        ['label' => 'Email', 'value' => 'info@urbankey.com'],
                        ['label' => 'Hours', 'value' => 'Monday to Saturday, 9am - 6pm'],
                    ] as $item)
                        <div class="rounded-lg border border-[#10201d]/10 bg-white p-5">
                            <p class="text-xs font-black uppercase tracking-[0.18em] text-[#8a7a61]">{{ $item['label'] }}</p>
                            <p class="mt-2 font-bold text-[#10201d]">{{ $item['value'] }}</p>
                        </div>
                    @endforeach
                </aside>

                <div class="rounded-lg border border-[#10201d]/10 bg-white p-5 shadow-[0_18px_45px_rgba(16,32,29,0.08)] sm:p-8">
                    @if(session('success'))
                        <div class="mb-6 rounded-lg border border-[#0f5e4d]/20 bg-[#edf4f1] p-4 text-sm font-bold text-[#0f5e4d]">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="field-label">First name</label>
                                <input type="text" name="first_name" id="first_name" autocomplete="given-name" value="{{ old('first_name', request('name')) }}" class="ui-field" required>
                            </div>
                            <div>
                                <label for="last_name" class="field-label">Last name</label>
                                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="ui-field" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="email" class="field-label">Email</label>
                                <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email', request('email')) }}" class="ui-field" required>
                            </div>
                            <div>
                                <label for="phone" class="field-label">Phone</label>
                                <input type="tel" name="phone" id="phone" autocomplete="tel" class="ui-field">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="field-label">Subject</label>
                            <select id="subject" name="subject" class="ui-field">
                                <option value="">Select a subject</option>
                                <option value="buying" {{ request('property') ? 'selected' : '' }}>Buying a property</option>
                                <option value="selling">Selling a property</option>
                                <option value="renting">Renting a property</option>
                                <option value="general">General inquiry</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="field-label">Message</label>
                            <textarea name="message" id="message" rows="5" class="ui-field min-h-36" required>{{ old('message', request('message')) }}</textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full sm:w-auto">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
