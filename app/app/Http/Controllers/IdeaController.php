<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    // public function destroy($id){

    //     Idea::where('id',$id)->firstOrFail()->delete();

    //     return redirect()->route('dashboard')->with('success','Idea deleted successfully');
    // }

    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
    }

    public function store(){
        // request()->validate([
        //     'content'=> 'required|min:3|max:240',
        // ]);
        // $idea = Idea::create(
        //     [
        //         'content' => request()->get('content', ''),
        //     ]
        // );

        $validated = request()->validate([
            'content'=> 'required|min:3|max:240',
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea created successfully');

    }

    public function destroy(Idea $idea){
        // if(auth()->id() !== $idea->user_id){
        //     abort(404,'You can delete only your idea');
        // }

    $this->authorize('delete.idea',$idea);

        $idea->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted successfully');
    }

    public function edit(Idea $idea){
        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }

        $this->authorize('edit.idea',$idea);


        $editing = true;
        return view('ideas.show', compact('idea','editing'));
    }

    public function update(Idea $idea){

        // request()->validate([
        //     'content'=> 'required|min:3|max:240',
        // ]);

        // $idea->content = request()->get('content','');
        // $idea->save();
        // if(auth()->id() !== $idea->user_id){
        //     abort(404);
        // }

        $this->authorize('edit.idea',$idea);

        $validated = request()->validate([
            'content'=> 'required|min:3|max:240',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully');
    }
}
