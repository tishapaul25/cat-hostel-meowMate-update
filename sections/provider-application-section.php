<section class="relative w-full py-16 bg-gradient-to-br from-emerald-50 via-white to-teal-50">
    <div class="container px-4 md:px-6 mx-auto max-w-4xl">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-700 mb-4">
                🏠 Join Our Network
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Become a Cat Hostel Provider
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Join thousands of trusted providers and start earning by providing loving care for cats in your area.
            </p>
        </div>

        <!-- Application Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100">
            <form method="POST" action="process-provider-application.php" enctype="multipart/form-data"
                class="space-y-10">

                <!-- Personal Information -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            1</div>
                        <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name
                                *</label>
                            <input type="text" id="first_name" name="first_name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name
                                *</label>
                            <input type="text" id="last_name" name="last_name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address
                                *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number
                                *</label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Full Address *</label>
                        <textarea id="address" name="address" rows="3" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"></textarea>
                    </div>
                </div>

                <!-- Experience & Qualifications -->
                <div class="space-y-6 border-t border-gray-200 pt-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            2</div>
                        <h2 class="text-2xl font-bold text-gray-900">Experience & Qualifications</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="experience_years" class="block text-sm font-medium text-gray-700 mb-2">Years of
                                Experience with Cats *</label>
                            <select id="experience_years" name="experience_years" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                <option value="">Select experience</option>
                                <option value="1-2">1-2 years</option>
                                <option value="3-5">3-5 years</option>
                                <option value="6-10">6-10 years</option>
                                <option value="10+">10+ years</option>
                            </select>
                        </div>
                        <div>
                            <label for="own_cats" class="block text-sm font-medium text-gray-700 mb-2">Do you currently
                                own cats? *</label>
                            <select id="own_cats" name="own_cats" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                <option value="">Select option</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="qualifications" class="block text-sm font-medium text-gray-700 mb-2">Relevant
                            Qualifications/Certifications</label>
                        <textarea id="qualifications" name="qualifications" rows="3"
                            placeholder="List any veterinary training, pet care certifications, or relevant qualifications..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"></textarea>
                    </div>

                    <div>
                        <label for="why_provider" class="block text-sm font-medium text-gray-700 mb-2">Why do you want
                            to become a cat hostel provider? *</label>
                        <textarea id="why_provider" name="why_provider" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"></textarea>
                    </div>
                </div>

                <!-- Facility Information -->
                <div class="space-y-6 border-t border-gray-200 pt-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            3</div>
                        <h2 class="text-2xl font-bold text-gray-900">Facility Information</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="property_type" class="block text-sm font-medium text-gray-700 mb-2">Property
                                Type *</label>
                            <select id="property_type" name="property_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                <option value="">Select property type</option>
                                <option value="house">House</option>
                                <option value="apartment">Apartment</option>
                                <option value="dedicated_facility">Dedicated Facility</option>
                            </select>
                        </div>
                        <div>
                            <label for="max_capacity" class="block text-sm font-medium text-gray-700 mb-2">Maximum Cat
                                Capacity *</label>
                            <select id="max_capacity" name="max_capacity" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                                <option value="">Select capacity</option>
                                <option value="1-3">1-3 cats</option>
                                <option value="4-6">4-6 cats</option>
                                <option value="7-10">7-10 cats</option>
                                <option value="10+">10+ cats</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Available Services *</label>
                        <div class="grid md:grid-cols-2 gap-3">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="overnight_boarding"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Overnight Boarding</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="day_care"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Day Care</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="grooming"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Grooming</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="medical_care"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Basic Medical Care</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="pickup_delivery"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Pickup & Delivery</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" name="services[]" value="emergency_care"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-gray-700">Emergency Care</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label for="facility_description" class="block text-sm font-medium text-gray-700 mb-2">Facility
                            Description *</label>
                        <textarea id="facility_description" name="facility_description" rows="4" required
                            placeholder="Describe your facility, safety measures, play areas, etc..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"></textarea>
                    </div>
                </div>

                <!-- Pricing & Availability -->
                <div class="space-y-6 border-t border-gray-200 pt-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            4</div>
                        <h2 class="text-2xl font-bold text-gray-900">Pricing & Availability</h2>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <label for="overnight_rate" class="block text-sm font-medium text-gray-700 mb-2">Overnight
                                Rate (per night) *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">$</span>
                                <input type="number" id="overnight_rate" name="overnight_rate" min="10" max="100"
                                    required
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            </div>
                        </div>
                        <div>
                            <label for="day_care_rate" class="block text-sm font-medium text-gray-700 mb-2">Day Care
                                Rate (per day)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">$</span>
                                <input type="number" id="day_care_rate" name="day_care_rate" min="5" max="50"
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            </div>
                        </div>
                        <div>
                            <label for="grooming_rate" class="block text-sm font-medium text-gray-700 mb-2">Grooming
                                Rate</label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">$</span>
                                <input type="number" id="grooming_rate" name="grooming_rate" min="15" max="80"
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Available Days *</label>
                        <div class="grid grid-cols-4 md:grid-cols-7 gap-3">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="monday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Mon</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="tuesday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Tue</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="wednesday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Wed</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="thursday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Thu</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="friday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Fri</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="saturday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Sat</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="available_days[]" value="sunday"
                                    class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                                <span class="text-sm text-gray-700">Sun</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Documents & Photos -->
                <div class="space-y-6 border-t border-gray-200 pt-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            5</div>
                        <h2 class="text-2xl font-bold text-gray-900">Documents & Photos</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">Profile
                                Photo *</label>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <div>
                            <label for="id_document" class="block text-sm font-medium text-gray-700 mb-2">Government ID
                                *</label>
                            <input type="file" id="id_document" name="id_document" accept="image/*,.pdf" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                    </div>

                    <div>
                        <label for="facility_photos" class="block text-sm font-medium text-gray-700 mb-2">Facility
                            Photos (up to 5) *</label>
                        <input type="file" id="facility_photos" name="facility_photos[]" accept="image/*" multiple
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        <p class="text-xs text-gray-500 mt-2">Upload photos of your facility, play areas, sleeping
                            areas, etc.</p>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="space-y-4 border-t border-gray-200 pt-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-8 h-8 bg-emerald-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            6</div>
                        <h2 class="text-2xl font-bold text-gray-900">Terms & Conditions</h2>
                    </div>

                    <div class="space-y-4 bg-gray-50 p-6 rounded-lg">
                        <label class="flex items-start space-x-3">
                            <input type="checkbox" name="terms_conditions" value="1" required
                                class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 mt-1">
                            <span class="text-sm text-gray-700">I agree to the <a href="#"
                                    class="text-emerald-600 hover:text-emerald-700 underline">Terms and Conditions</a>
                                and <a href="#" class="text-emerald-600 hover:text-emerald-700 underline">Privacy
                                    Policy</a></span>
                        </label>
                        <label class="flex items-start space-x-3">
                            <input type="checkbox" name="background_check" value="1" required
                                class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 mt-1">
                            <span class="text-sm text-gray-700">I consent to a background check and verification
                                process</span>
                        </label>
                        <label class="flex items-start space-x-3">
                            <input type="checkbox" name="insurance_agreement" value="1" required
                                class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 mt-1">
                            <span class="text-sm text-gray-700">I understand that I need to maintain appropriate
                                insurance coverage</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-8">
                    <button type="submit"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 px-12 rounded-xl text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-emerald-400/50">
                        Submit Application
                    </button>
                    <p class="text-gray-600 text-sm mt-4">
                        We'll review your application within 2-3 business days and get back to you!
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>