<?php

    namespace DEVAPP\Http;

    class Flash
    {
        /**
         * @param $title
         * @param $message
         * @param $level
         * @param string $key
         */

        protected function create($title, $message, $level, $key = 'flash_message')
        {
            session()->flash($key, [

                'title' => $title,
                'message' => $message,
                'level' => $level

            ]);
        }


        public function info($title, $message)
        {
            return $this->create($title, $message, 'info');
        }

        public function success($title, $message)
        {
            return $this->create($title, $message, 'success');
        }

        public function error($title, $message)
        {
            return $this->create($title, $message, 'error');
        }

        public function overlay($title, $message, $level = 'success')
        {
            return $this->create($title, $message, $level, 'flash_message_overlay');
        }

    }