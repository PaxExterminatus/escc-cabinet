import {APIResponse} from './APIResponse';
import CurseAudio from './CurseAudio';

interface CurseAudioData extends APIResponse
{
    download_url: string
    files: CurseAudio[]
}
