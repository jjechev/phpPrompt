<pre>
in .bachrc
==========

function _update_ps1() {
    PS1="$(php /home/rax/programs/prompt/prompt.php clock temp ls load disk alert userandhost workdir git)"
}

if [[ $TERM =~ .*-256color$ ]]; then
    PROMPT_COMMAND="_update_ps1; $PROMPT_COMMAND"
fi
