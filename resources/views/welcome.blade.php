<x-guest-layout>
    <section class="h-screen w-screen flex items-center">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Post</h3>
                      <p class="mt-1 text-sm text-gray-600">
                        Create a post
                      </p>
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('posts:store') }}" method="POST">
                      @csrf
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                          <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                              <label for="title" class="block text-sm font-medium text-gray-700">
                                Website
                              </label>
                              <div class="mt-1 flex rounded-md shadow-sm">
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" 
                                    placeholder="Give your post a title"
                                    required
                                    autofocus
                                >
                              </div>
                            </div>
                          </div>
            
                          <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                              Description
                            </label>
                            <div class="mt-1">
                                <textarea 
                                    id="description" 
                                    name="description" 
                                    rows="3" 
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
                                    placeholder="Give your post a description"
                                ></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                              A description for your post.
                            </p>
                          </div>

                          <div>
                            <label for="body" class="block text-sm font-medium text-gray-700">
                              Post Body
                            </label>
                            <div class="mt-1">
                                <textarea 
                                    id="body" 
                                    name="body" 
                                    rows="3" 
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" 
                                    placeholder="Give your post a body"
                                ></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                              This is your post body, make it interesting.
                            </p>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button 
                                type="submit" 
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
