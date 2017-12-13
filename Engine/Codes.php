<?php

abstract class Codes
{
    /*
      \a     an ASCII bell character (07)
      \d     the date in "Weekday Month Date" format (e.g., "Tue May 26")
      \D{format}
      the format is passed to strftime(3) and the result is inserted into the prompt string; an empty format results in a locale-
      specific time representation.  The braces are required
      \e     an ASCII escape character (033)
      \h     the hostname up to the first `.'
      \H     the hostname
      \j     the number of jobs currently managed by the shell
      \l     the basename of the shell's terminal device name
      \n     newline
      \r     carriage return
      \s     the name of the shell, the basename of $0 (the portion following the final slash)
      \t     the current time in 24-hour HH:MM:SS format
      \T     the current time in 12-hour HH:MM:SS format
      \@     the current time in 12-hour am/pm format
      \A     the current time in 24-hour HH:MM format
      \u     the username of the current user
      \v     the version of bash (e.g., 2.00)
      \V     the release of bash, version + patch level (e.g., 2.00.0)
      \w     the current working directory, with $HOME abbreviated with a tilde (uses the value of the PROMPT_DIRTRIM variable)
      \W     the basename of the current working directory, with $HOME abbreviated with a tilde
      \!     the history number of this command
      \#     the command number of this command
      \$     if the effective UID is 0, a #, otherwise a $
      \nnn   the character corresponding to the octal number nnn
      \\     a backslash
      \[     begin a sequence of non-printing characters, which could be used to embed a terminal control sequence into the prompt
      \]     end a sequence of non-printing characters

     */

    const BELL = "\s";
    const TIME = "\A";
    const DATE = "\d";
    const CURSOR_UP = "\033[1A";
    const CURSOR_DOWN = "\033[1B";
    const CURSOR_RIGHT = "\033[1C";
    const CURSOR_LEFT = "\033[1D";
    const TEXT_COLOR_SYSTEM_DEFAULT = 39;
    const TEXT_COLOR_BLACK = 30;
    const TEXT_COLOR_RED = 31;
    const TEXT_COLOR_GREEN = 32;
    const TEXT_COLOR_YELLOW = 33;
    const TEXT_COLOR_BLUE = 34;
    const TEXT_COLOR_MAGENTA = 35;
    const TEXT_COLOR_CYAN = 36;
    const TEXT_COLOR_LIGHT_GRAY = 37;
    const TEXT_COLOR_DARK_GRAY = 90;
    const TEXT_COLOR_LIGHT_RED = 91;
    const TEXT_COLOR_LIGHT_GREEN = 92;
    const TEXT_COLOR_LIGHT_YELLOW = 93;
    const TEXT_COLOR_LIGHT_BLUE = 94;
    const TEXT_COLOR_LIGHT_MAGENTA = 95;
    const TEXT_COLOR_LIGHT_CYAN = 96;
    const TEXT_COLOR_WHITE = 97;
    const BACKGROUND_COLOR_SYSTEM_DEFAULT = 49;
    const BACKGROUND_COLOR_BLACK = 40;
    const BACKGROUND_COLOR_RED = 41;
    const BACKGROUND_COLOR_GREEN = 42;
    const BACKGROUND_COLOR_YELLOW = 43;
    const BACKGROUND_COLOR_BLUE = 44;
    const BACKGROUND_COLOR_MAGENTA = 45;
    const BACKGROUND_COLOR_CYAN = 46;
    const BACKGROUND_COLOR_LIGHT_GRAY = 47;
    const BACKGROUND_COLOR_DARK_GRAY = 100;
    const BACKGROUND_COLOR_LIGHT_RED = 101;
    const BACKGROUND_COLOR_LIGHT_GREEN = 102;
    const BACKGROUND_COLOR_LIGHT_YELLOW = 103;
    const BACKGROUND_COLOR_LIGHT_BLUE = 104;
    const BACKGROUND_COLOR_LIGHT_MAGENTA = 105;
    const BACKGROUND_COLOR_LIGHT_CYAN = 106;
    const BACKGROUND_COLOR_WHITE = 107;
    const TEXT_STYLE_BOLD = 1;
    const TEXT_STYLE_DIM = 2;
    const TEXT_STYLE_ITALIC = 3;
    const TEXT_STYLE_UNDERLINE = 4;
    const TEXT_STYLE_BLINK = 5; //Does not work with most of the terminal emulators, works in the tty and XTerm.
    const TEXT_STYLE_REVERSE = 7;
    const TEXT_STYLE_HIDDEN = 8;
    const RESET_ALL_ATTRIBUTES = 0;

    /*
     * @param array $styleCodes
     * @return string
     */
    protected function getStyleCode(array $styleCodes)
    {
        $codes = implode(";", $styleCodes);
        return "\[\033[{$codes}m\]";
    }

}
