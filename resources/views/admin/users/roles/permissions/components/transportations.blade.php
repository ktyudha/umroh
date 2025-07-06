<section class="mt-4">
    <h6 class="text-muted mb-3">Transportations</h6>

    <div class="flex items-center">
        <input type="checkbox" id="transportations_read" name="transportations_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportations read') or $role->name === 'superadmin') checked @endif>

        <label for="transportations_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read transportations
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportations_create" name="transportations_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportations create') or $role->name === 'superadmin') checked @endif>

        <label for="transportations_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create transportations
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportations_update" name="transportations_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportations update') or $role->name === 'superadmin') checked @endif>

        <label for="transportations_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit transportations
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="transportations_delete" name="transportations_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('transportations delete') or $role->name === 'superadmin') checked @endif>

        <label for="transportations_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete transportations
        </label>
    </div>

</section>
