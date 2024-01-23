    @if (is_array(json_decode($property->images)) && count(json_decode($property->images)) === 1)
                                    @php
                                        $imagePath = json_decode($property->images)[0];
                                    @endphp
                                    <div class="item">
                                        <a class="portfolio-img" href="{{ asset('property/images/' . $imagePath) }}">
                                            <img class="img-fluid" src="{{ asset('property/images/' . $imagePath) }}" alt="">
                                        </a>
                                    </div>
                                @elseif (is_array(json_decode($property->images)) && count(json_decode($property->images)) > 1)
                                    {{-- Display a collection of images --}}
                                    @foreach (json_decode($property->images) as $imagePath)
                                        <div class="item">
                                            <a class="portfolio-img" href="{{ asset('property/images/' . $imagePath) }}">
                                                <img class="img-fluid" src="{{ asset('property/images/' . $imagePath) }}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif