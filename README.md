# PHPP: PHP PROMPT


### Installing
You must have php-cli installed. Paste this code into .bashrc

```bash
function _update_ps1() {
    PS1="$(php /path/to/phpPrompt/prompt.php clock temp ls load disk alert userandhost workdir git)"
}

if [[ $TERM =~ .*-256color$ ]]; then
    PROMPT_COMMAND="_update_ps1; $PROMPT_COMMAND"
fi
```

![img](https://raw.githubusercontent.com/jjechev/phpPrompt/master/Doc/img/phpPrompt.png)


### Segments 

- Alert
- Host
- User
- ClassicPrompt
- LastSeparator
- Phpversion
- Workdir
- Clock
- Load
- Shell
- Disk
- Ls
- Temp
- Git
- Newline
- Userandhost