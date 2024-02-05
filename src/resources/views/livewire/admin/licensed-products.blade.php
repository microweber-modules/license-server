<div>

    <div>
        <h3>{{_e('Add Licensed Product')}}</h3>
        <div>
            <form class="d-flex gap-2 align-items-center" wire:submit.prevent="addLicensedProduct">
                <div class="form-group">
                    <label for="licensed_product_id">{{_e('Licensable ID')}}</label>
                    <select class="form-control" wire:model="licensable">
                        <option value="">{{_e('Select')}}</option>

                        @if ($products->count() > 0)
                        <optgroup label="Products">
                        @foreach($products as $product)
                            <option value="product.{{ $product->id }}">{{ $product->title }}</option>
                        @endforeach
                        </optgroup>
                        @endif

                        @if ($subscriptionPlans->count() > 0)
                        <optgroup label="Subscription Plans">
                        @foreach($subscriptionPlans as $subscriptionPlan)
                            <option value="subscription_plans.{{ $subscriptionPlan->id }}">{{ $subscriptionPlan->name }}</option>
                        @endforeach
                        </optgroup>
                        @endif

                    </select>
                    @error('licensed_product_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div  style="width:400px"  class="form-group">
                    <label for="licensed_product_id">{{_e('License Prefix')}}</label>
                    <input type="text" class="form-control" wire:model="license_prefix">
                    @error('license_prefix') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
               <div>
                   <button type="submit" class="btn btn-primary">{{_e('Add')}}</button>
               </div>
            </form>
        </div>
    </div>


    <div>
        <h3>{{_e('Licensed Products')}}</h3>
    </div>
    @if($licensedProducts->count() > 0)
    @foreach($licensedProducts as $licensedProduct)
        <div class="card mt-4">
            <div class="card-body">
                <p>{{$licensedProduct->licensableTypeName()}}: {{ $licensedProduct->title() }}</p>

                <p>Prefix: {{$licensedProduct->licensable_prefix}}</p>

                <button wire:click="delete('{{$licensedProduct->id}}')" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                    Delete
                </button>
            </div>
        </div>
    @endforeach
    @else
        <div class="alert alert-warning" role="alert">
            {{_e('No licensed products found')}}
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{_e('Results found:')}} {{$licensedProducts->total()}}
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{$licensedProducts->links('livewire::bootstrap')}}
    </div>

</div>
