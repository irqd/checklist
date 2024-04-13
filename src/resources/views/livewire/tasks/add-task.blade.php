<div wire:ignore.self class="modal modal-lg fade" tabindex="-1" id="newTaskModal" aria-labelledby="newTaskModalLabel"
    aria-hidden="true">
   <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newTaskModalLabel">Task:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <div class="modal-body">
            <form>
               <div class="row justify-content-center align-items-start g-3">
                  <div class="col-12 col-md-6">
                     <div class="mb-3">
                        <label class="form-label fw-bold">
                           Title
                        </label>
                        <input type="text" class="form-control form-control-sm" wire:model="form.title" />

                        @error('form.title')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea class="form-control form-control-sm" rows="3" placeholder="Make your tasks meaningful..." wire:model="form.description"></textarea>

                        @error('form.description')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label class="form-label fw-bold">Priority</label>
                        <div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="low"
                                 wire:model="form.priority" />
                              <label class="form-check-label">
                                 Low
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio"
                                 value="medium" wire:model="form.priority" />
                              <label class="form-check-label">
                                 Medium
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="high"
                                 wire:model="form.priority" />
                              <label class="form-check-label">
                                 High
                              </label>
                           </div>
                        </div>

                        @error('form.priority')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="pending" wire:model="form.status" />
                              <label class="form-check-label">
                                 Pending
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="in_progress" wire:model="form.status" />
                              <label class="form-check-label">
                                 In Progress
                              </label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="completed" wire:model="form.status" />
                              <label class="form-check-label" for="inlineRadio33">
                                 Completed
                              </label>
                           </div>
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label fw-bold">
                           Due Date
                        </label>
                        <input type="datetime-local" class="form-control form-control-sm" wire:model="form.due_date" />

                        @error('form.due_date')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="mb-3" >
                        <div wire:ignore>
                           <label class="form-label fw-bold">Category</label>
                           <select class="tom-select" aria-label="Category select" placeholder="Select category..." wire:model="form.category_id">
                              <option value="">Select category...</option>
                              @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" data-hex-color="{{ $category->hex_color }}">
                                    {{ $category->name }}
                                 </option>
                              @endforeach
                           </select>
                        </div>

                        @error('form.category_id')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <div wire:ignore>
                           <label class="form-label fw-bold">Tags</label>
                           <select class="tom-select" placeholder="Select tags..."
                              aria-label="Tags select" autocomplete="off" multiple wire:model="form.tags">
                              <option value="">Select tags...</option>
                              @foreach ($tags as $tag)
                                 <option value="{{ $tag->id }}" data-hex-color="{{ $tag->hex_color }}">
                                    {{ $tag->name }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                        
                        @error('form.tags')
                           <span class="text-danger fs-xs">{{ $message }}</span>
                        @enderror
                     </div>
                  </div>

                  <div class="col-12 col-md-6">
                     <div class="d-flex justify-content-between align-items-end border-bottom pb-1 mb-1">
                        <h6 class="mb-0">Subtasks</h6>
                        <a type="button" class="text-primary" wire:click="addSubTask">
                           <span wire:loading wire:target="addSubTask" class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span>

                           <i class="bi bi-plus-lg fs-sm" wire:loading.remove wire:target="addSubTask"></i>
                        </a>
                     </div>
                     <ul class="list-group border-0">
                        @forelse($form->sub_tasks as $index => $sub_task)
                           @if($sub_task['is_editing'])
                              <li class="list-group-item px-0">
                                 <div class="d-flex justify-content-between align-items-start gap-2">
                                    <div class="flex-grow-1">
                                       <div class="mb-3">
                                          <input type="text" class="form-control form-control-sm"
                                             placeholder="Subtask #{{ $loop->iteration }} title" wire:model="form.sub_tasks.{{ $index }}.title" />

                                          @error('form.sub_tasks.' . $index . '.title')
                                             <span class="text-danger fs-xs">{{ $message }}</span>
                                          @enderror
                                       </div>

                                       <div class="mb-3">
                                          <label for="exampleInputEmail1"
                                             class="form-label fw-bold">Priority</label>
                                          <div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="low" wire:model="form.sub_tasks.{{ $index }}.priority" />
                                                <label class="form-check-label" for="inlineRadio1">
                                                   Low
                                                </label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="medium" wire:model="form.sub_tasks.{{ $index }}.priority" />
                                                <label class="form-check-label" for="inlineRadio2">
                                                   Medium
                                                </label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="high" wire:model="form.sub_tasks.{{ $index }}.priority" />
                                                <label class="form-check-label" for="inlineRadio3">
                                                   High
                                                </label>
                                             </div>
                                          </div>

                                          @error('form.sub_tasks.' . $index . '.priority')
                                             <span class="text-danger fs-xs">{{ $message }}</span>
                                          @enderror
                                       </div>

                                       <div class="mb-3">
                                          <label for="exampleInputEmail1"
                                             class="form-label fw-bold">Status</label>
                                          <div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="pending" wire:model="form.sub_tasks.{{ $index }}.status" />
                                                <label class="form-check-label" for="inlineRadio11">
                                                   Pending
                                                </label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="in_progress" wire:model="form.sub_tasks.{{ $index }}.status" />
                                                <label class="form-check-label" for="inlineRadio22">
                                                   In Progress
                                                </label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                   value="completed" wire:model="form.sub_tasks.{{ $index }}.status" />
                                                <label class="form-check-label" for="inlineRadio33">
                                                   Completed
                                                </label>
                                             </div>
                                          </div>

                                          @error('form.sub_tasks.' . $index . '.status')
                                             <span class="text-danger fs-xs">{{ $message }}</span>
                                          @enderror
                                       </div>
                                    </div>

                                    <div>
                                       <a type="button" class="text-danger me-2" wire:click="cancelEditSubTask({{ $index }})">
                                          <i class="bi bi-x-lg"></i>
                                       </a>
                                       <a type="button" class="text-success" wire:click="saveEditSubTask({{ $index }})">
                                          <i class="bi bi-check-lg"></i>
                                       </a>
                                    </div>
                                 </div>
                              </li>
                           @else
                              <li class="list-group-item px-0">
                                 <div class="d-flex justify-content-between align-items-start">
                                    <div class="d-flex align-items-start g-1">
                                       {{-- <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value=""
                                             id="flexCheckDefault" />
                                       </div> --}}
                                       <div>
                                          <h6 class="mb-0">
                                             {{ $sub_task['title'] }}
                                          </h6>
                                          <span @class([
                                             'badge px-2',
                                             'text-bg-success' => $sub_task['priority']->value == 'low',
                                             'text-bg-warning' => $sub_task['priority']->value == 'medium',
                                             'text-bg-danger' => $sub_task['priority']->value == 'high',
                                          ])>
                                             {{ $sub_task['priority'] }}
                                          </span>
                                          <span @class([
                                             'badge px-2',
                                             'text-bg-warning' => $sub_task['status']->value == 'pending',
                                             'text-bg-primary' => $sub_task['status']->value == 'in_progress',
                                             'text-bg-success' => $sub_task['status']->value == 'completed',
                                          ])>
                                             {{ $sub_task['status']->value == 'in_progress' ? 'in progress' : $sub_task['status'] }}
                                          </span>
                                       </div>
                                    </div>
                                    <div>
                                       <a type="button" class="text-warning me-2" wire:click="editSubTask({{ $index }})">
                                          <i class="bi bi-pencil"></i>
                                       </a>
                                       <a type="button" class="text-danger" wire:click="cancelEditSubTask({{ $index }})">
                                          <i class="bi bi-trash"></i>
                                       </a>
                                    </div>
                                 </div>
                              </li>
                           @endif
                        @empty
                           <li class="list-group border-0">
                              <div class="d-flex justify-content-center align-items-center mt-3">
                                 <small class="text-muted fs-sm">No subtasks yet...</small>
                              </div>
                           </li>
                        @endforelse
                     </ul>
                  </div>
               </div>
            </form>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-subtle" data-bs-dismiss="modal">
               Cancel
            </button>
            <button type="submit" class="btn btn-primary" wire:click="save">
               <span wire:loading wire:target="save" class="spinner-border spinner-border-sm" role="status"
                  aria-hidden="true"></span>
               Save
            </button>
         </div>
      </div>
   </div>
</div>

@script
   <script>
      const newTaskModal = document.getElementById('newTaskModal');

      newTaskModal.addEventListener('hidden.bs.modal', event => {
         $wire.resetForm();
         resetSelectValues();
      })
   </script>
@endscript
