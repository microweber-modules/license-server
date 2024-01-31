<div>

    <style>
        .card-sm > .card-body {
            padding: 4px;
        }
        .badge-success {
            color: #fff;
            background-color: #28a745;
        }
        .badge-warning {
            color: #212529;
            background-color: #ffc107;
        }
        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }
    </style>

    <div class="col-12 mb-4">
        <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M125.18 156.94a64 64 0 1 0-82.36 0a100.23 100.23 0 0 0-39.49 32a12 12 0 0 0 19.35 14.2a76 76 0 0 1 122.64 0a12 12 0 0 0 19.36-14.2a100.33 100.33 0 0 0-39.5-32M44 108a40 40 0 1 1 40 40a40 40 0 0 1-40-40m206.1 97.67a12 12 0 0 1-16.78-2.57A76.31 76.31 0 0 0 172 172a12 12 0 0 1 0-24a40 40 0 1 0-14.85-77.16a12 12 0 1 1-8.92-22.28a64 64 0 0 1 65 108.38a100.23 100.23 0 0 1 39.49 32a12 12 0 0 1-2.62 16.73"/></svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <strong>
                                        {{$totalLicensesCount}}
                                    </strong>
                                </div>
                                <div class="text-secondary">
                                    Total Licenses
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 0C229.232 0 0 229.232 0 512c0 282.784 229.232 512 512 512c282.784 0 512-229.216 512-512C1024 229.232 794.784 0 512 0m0 961.008c-247.024 0-448-201.984-448-449.01c0-247.024 200.976-448 448-448s448 200.977 448 448s-200.976 449.01-448 449.01m204.336-636.352L415.935 626.944l-135.28-135.28c-12.496-12.496-32.752-12.496-45.264 0c-12.496 12.496-12.496 32.752 0 45.248l158.384 158.4c12.496 12.48 32.752 12.48 45.264 0c1.44-1.44 2.673-3.009 3.793-4.64l318.784-320.753c12.48-12.496 12.48-32.752 0-45.263c-12.512-12.496-32.768-12.496-45.28 0"/></svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{$activeLicensesCount}}
                                </div>
                                <div class="text-secondary">
                                    Active Licenses
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8.175.002a8 8 0 1 0 2.309 15.603a.75.75 0 0 0-.466-1.426a6.5 6.5 0 1 1 3.996-8.646a.75.75 0 0 0 1.388-.569A8 8 0 0 0 8.175.002M8.75 3.75a.75.75 0 0 0-1.5 0v3.94L5.216 9.723a.75.75 0 1 0 1.06 1.06L8.53 8.53l.22-.22zM15 15a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-.25-6.25a.75.75 0 0 0-1.5 0v3.5a.75.75 0 0 0 1.5 0z" clip-rule="evenodd"/></svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{$expiredLicensesCount}}
                                </div>
                                <div class="text-secondary">
                                    Expired Licenses
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M248 128a56 56 0 0 1-95.6 39.6l-.33-.35l-59.95-67.7a40 40 0 1 0 0 56.9l8.52-9.62a8 8 0 1 1 12 10.61l-8.69 9.81l-.33.35a56 56 0 1 1 0-79.2l.33.35l59.95 67.7a40 40 0 1 0 0-56.9l-8.52 9.62a8 8 0 1 1-12-10.61l8.69-9.81l.33-.35A56 56 0 0 1 248 128"/></svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{$lifetimeLicensesCount}}
                                </div>
                                <div class="text-secondary">
                                    Lifetime Licenses
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between gap-2 my-2">
                    <h3>
                        {{_e('Licenses')}}
                    </h3>
                    <div>
                        <button type="button" class="btn btn-sm btn-primary">
                          {{_e('Generate new License')}}
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">{{_e('Owner')}}</th>
                                <th class="font-weight-bold">{{_e('Domain')}}</th>
                                <th class="font-weight-bold">{{_e('License Key')}}</th>
                                <th class="font-weight-bold">{{_e('Expiration Date')}}</th>
                                <th class="font-weight-bold">{{_e('Lifetime')}}</th>
                                <th class="font-weight-bold">{{_e('Status')}}</th>
                            </tr>
                        </thead>

                        <tbody class="small">
                        @foreach ($licenses as $license)
                            <tr>
                                <td>
                                    @if($license['user_id'] == 0)
                                        {{_e('Not Assigned')}}
                                    @else
                                    {{ user_name($license['user_id']) }}
                                    @endif
                                </td>
                                <td>{{$license['domain']}}</td>
                                <td>
                                    <div x-data="{showLicense:false}">
                                        <span x-show="!showLicense" class="cursor-pointer text-primary" x-on:click="showLicense =! showLicense">
                                            {{$license->license_key_masked}}
                                        </span>
                                        <span x-show="showLicense" class="cursor-pointer text-primary" x-on:click="showLicense =! showLicense">
                                            {{$license->license_key}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    {{$license['expiration_date']}}
                                </td>
                                <td>
                                @if($license['is_lifetime'] == 1)
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif
                                </td>
                                <td>
                                    @if($license['status'] == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @elseif($license['status'] == 'suspended')
                                        <span class="badge badge-warning">Suspended</span>
                                    @else
                                        <span class="badge badge-danger">Expired</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{$licenses->links('livewire::bootstrap')}}
                </div>

            </div>
        </div>
    </div>

</div>
